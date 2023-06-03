<?php

namespace App\Repositories;

use App\Interfaces\AdminInterface;
use App\Traits\ResponseApi;
use Illuminate\Support\Facades\Hash;
use App\Models\People;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;


class AdminRepository implements AdminInterface
{
    use ResponseApi;


    public function createUser($request)
    {
        try{
            DB::beginTransaction();
            $person = People::create($request->only('first_name','last_name','phone_number','address1','postcode','city','tin'));
            $user = $person->user()->create($request->only('email','role_id')
                +['password' =>Hash::make($request->password)]
                +['added_by' => Auth::user()->id]
                +['super_user' => ($request->super_user ? 1 : 0)]);

            if($request->hasFile('profile_avatar'))
            {
                $destination_path = "/profiles/$person->id";
                $image = $request->file('profile_avatar');
                $image_name = $image->getClientOriginalName();
                $request->file('profile_avatar')->storeAs($destination_path, $image_name);
                People::find($person->id)->update(['image' => "$destination_path/$image_name"]);

            }else
            {
                $image_name = "";
            }

            if(!is_null($request->tenant_number)){
                foreach($request->tenant_number as $tenant_number){
                    $user->tenants()->create(['tenant_number'=>$tenant_number]);
                    Cache::forget('tenant-list');
                }
            }
            DB::commit();
            $this->success('User created successfully',$user,201);
        }catch(Throwable $e)
        {
            DB::rollBack();
            return $this->error($e->getMessage(),400);
        }
    }

    public function viewUsers($request)
    {
        $user = People::with('user.role');
        $filter = (isset($request->input('query')['searchedValue']) ?  $request->input('query')['searchedValue'] : '');
        if($filter){
            $user->where(DB::raw("concat(first_name,' ',last_name)"), 'like', '%'.$filter.'%');
        }else{
            if($request->input('query'))
            {
                $id = $request->input('query')['position_type'];
                if(!empty($request->input('query')['position_type'])){
                    $user->whereHas('user.role', function($query) use($id){
                        $query->where('id', $id);
                    });
                }
            }

        }
        return $user->get();
    }

    public function updateUserInformation($request, int $id = null)
    {
        try{
            DB::beginTransaction();

            $userID = ($id ? $id : Auth::user()->id);
            $user = User::with('people','role')->findOrfail($userID);

            if($request->hasFile('image'))
            {   $id = $user->people->id;
                $destination_path = "/profiles/$id";
                $image = $request->file('image');
                $image_name = $image->getClientOriginalName();
                People::find($id)->update(['image' => "$destination_path/$image_name"]);
                $request->file('image')->storeAs($destination_path, $image_name);
                $path = "$destination_path/$image_name";
            }else{
                $path = "";
            }

            if(Auth::user()->role_id === 4){
                $this->updateUserInformationLog($request,$path,$userID);
                $latestData = null;
            }else{
                $user->people->update($request->only('first_name','last_name','address1')
                +['image' => $path]);

              if($request->collection_handler != 1)
              {
                Tenant::where('user_id', $userID)->update(['collection_handler' => $request->collection_handler]);
              }

                $latestData = tap($user)->update($request->only('email'));
            }

            DB::commit();

            return $this->success('Profile Updated!', $latestData,200);
        }catch(Throwable $e){
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    private function updateUserInformationLog($data ,$path,$id)
    {

        SystemLog::create([
            'user_id' => $id,
            'model' => \json_encode([People::class,User::class]),
            'details' => \json_encode([
                People::class => $data->only('first_name','last_name','address1','phone_number')
                +['image' => $path],
                User::class => $data->only('email')
            ]),
            'description' => 'Update user information'
        ]);

    }

    public function updateUserCredentials($request, int $id = null)
    {
        try{
            DB::beginTransaction();
            $userID = ($id ? $id : Auth::user()->id);
            $user = User::findOrFail($userID);
            if(Hash::check($request->new_password,$user->password))
                    return $this->error('Your new password cannot be the same as your current password', 400);

            $user->update(['password' => Hash::make($request->new_password)]);
            DB::commit();
            return $this->success('Password Updated',$user,200);
        }catch(Exception $e)
        {
            DB::rollBack();
            return $this->error($e->getMessage(),400);
        }
    }

    public function viewLogDetails(int $id)
    {
        return SystemLog::with('user')->findOrFail($id);
    }

    public function actionUserUpdate($request, $id)
    {
        try{
            DB::beginTransaction();
            if($request->status == 1){
                $people = People::with('user')->findOrFail($request->user_id);
                $sysLog = SystemLog::with('user')->findOrFail($id);
                $people->update($request->only('first_name','last_name','email','phone_number','address1'));

                $people->user()->update($request->only('email'));

                $sysLog->update(['details' => \json_encode([
                        People::class => $request->only('first_name','last_name','address1','phone_number'),
                        User::class => $request->only('email')
                    ]),
                    'description' => 'Admin accepted the user information changes',
                    'status' => 1
                ]);
            }else{
                $sysLog = SystemLog::with('user')->findOrFail($id);
                $sysLog->update([
                'description' => 'Admin decline the user information changes',
                'status' => 2]);
            }
            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function validateEmail($validateEmail, $isProfile, $currentID)
    {
        $validate = User::where('email', $validateEmail);
        if(filter_var($isProfile, FILTER_VALIDATE_BOOLEAN)){
            $validate->where('id', '<>', $currentID);
        }
        return ($validate->first()
                ? response()->json(['valid' => false,'message' => 'This email is not available'])
                : response()->json(['valid' => true]));
    }


}
