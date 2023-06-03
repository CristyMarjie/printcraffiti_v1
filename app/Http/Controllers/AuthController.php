<?php

namespace App\Http\Controllers;


use App\Models\Role;
use App\Models\User;
use App\Models\Product;
use App\Providers\RouteServiceProvider;
use App\Traits\ResponseApi;
use Carbon\Carbon;
use Error;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class AuthController extends Controller
{

    use ResponseApi;
    public function authenticate(Request $request)
    {
        try{

            DB::beginTransaction();

            /*********************************************
            * Validate user if registered
            *********************************************/
            $valid = Auth::attempt($request->only('email','password'));


            if(!$valid) throw new Error('Invalid Username Or Password',404);

            $user = Auth::user();

            $redirect ="";


            /*********************************************
            * This is a case statement that has redirect
            * to a route in different user role.
            *********************************************/
            switch($user->role_id){
                case Role::ADMIN:
                        $redirect = RouteServiceProvider::ADMIN_DASHBOARD;
                    break;
                case Role::STAFF:
                        $redirect = RouteServiceProvider::STAFF_DASHBOARD;
                    break;
                case Role::CUSTOMER:
                        $redirect = RouteServiceProvider::CUSTOMER_PAGE;
                    break;
                default:
                    throw new Error('Invalid User Role', 400);
                break;
            }

            DB::commit();

            return $this->success(true,['redirect_to' => $redirect],200);

        }catch(Throwable $e){

            DB::rollBack();

            return $this->error($e->getMessage(),$e->getCode());
        }

    }
    
    public function login(Request $request)
    {
        return (Auth::attempt($request->only('email','password')) ? $this->success('Success') : $this->error('Invalid Username/Password',404));
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        if(Auth::user()->isCustomer()){
            /*********************************************
            * Logging out currently authenticated user
            *********************************************/
            Auth::logout();
            return redirect('/');
        }else{
            Auth::logout();
            return redirect('/login');

        }
        /*********************************************
        * Invalidate user session
        *********************************************/
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        /*********************************************
        *  redirect user to root
        *********************************************/
        
    }

    public function dashboard()
    {
        $user = Auth::user();
        if (Auth::user()->isAdmin() || Auth::user()->isStaff()) {
            // $categories = Category::where('status',1)->get();
            return view('pages.dashboard.dashboard',['roles' => Role::get()]);
        } else {
            return view('home',['products' => Product::all()]);
        }
    }
}
