<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Traits\ResponseApi;

use Illuminate\Support\Facades\Auth;
use App\Interfaces\AdminInterface;
use App\Models\People;

class AdminController extends Controller
{
    use ResponseApi;

    protected $adminInterface;

    public function __construct(AdminInterface $adminInterface)
    {
        $this->adminInterface = $adminInterface;
    }

    public function viewUsers(Request $request)
    {
        return $this->adminInterface->viewUsers($request);
    }

    public function viewUserUI()
    {
        return view('pages.profile.view_user',['roles' => Role::get()]);
    }

    public function creatUser(Request $request)
    {
        return $this->adminInterface->createUser($request);
    }

    public function updateUserCredentials(Request $request, int $id = null)
    {
        return $this->adminInterface->updateUserCredentials($request, $id);
    }

    public function updateUserInformation(Request $request, $id)
    {
        return $this->adminInterface->updateUserInformation($request, $id);
    }
    public function viewUsersProfile(int $id = null)
    {

        $peopleID = ($id ? $id : Auth::user()->id);
        $people =  User::with('people')->find($peopleID);

        return view('pages.profile.profile',[
                        'user' => ($id ? User::with('people','role')
                        ->whereHas('people', function($query) use($id){
                            $query->where('id', $id);
                        })->firstOrFail()
                        : Auth::user()),
                        'route' => ($id ? 'user.profile':'profile'),
                        'image' => ($people->image ? $people->image : ''),
                        'location' => Location::get()
            ]);
    }

    public function updateUserCredential(int $id = null)
    {

        return view('pages.profile.update_password',[
                        'user' => ($id ? User::with('people', 'role')
                            ->whereHas('people', function($query) use($id){
                                    $query->where('id',$id);
                            })->firstOrFail()
                                :Auth::user()),
                        'route' => ($id ? 'user.change-password' : 'profile.change-password')
                    ]);
    }

    public function viewLogDetails(int $id)
    {
        return $this->adminInterface->viewLogDetails($id);
    }
    public function actionUserUpdate(Request $request, $id)
    {
        return $this->adminInterface->actionUserUpdate($request, $id);
    }
    public function validateEmail(Request $request)
    {
        return $this->adminInterface->validateEmail($request->email, $request->isProfile, $request->currentID);
    }

}
