<?php

namespace App\Http\Controllers;

use App\Models\MasterTenant;
use App\Models\Role;
use App\Models\User;
use App\Models\People;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function allProducts(){
        $products = Product::all();
        return view('home', ['products' => $products]);
    }
    public function store(Request $request)
    {
        // delete
        if ($request->method == 'deleteUser') {
            $this->destroyUser($request->us_prod_id);
        }

        if ($request->method == 'signUp')
        {
            $this->signUp($request);
            return redirect('/sign_up');
        }
        
        // toggling status
        if ($request->method == 'toggleStatus') {
            $this->toggleStatus($request, $request->id);
        }
        // complete all tasks
        if ($request->method == 'completeAllTasks') {
            $this->completeAllTasks($request, $request->id);
        }
        

        // deleteAll
        if ($request->method == 'deleteAll') {
            $this->destroyAll();
        }
        // add a new user
        if ($request->method == 'addUser')
        {
            $this->addUser($request);
        }

        return redirect()->route('users.index');
        
    }
    public function signUp(Request $request)
    {
        
        $person = People::create([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'phone_number' =>  $request->phone_number,
            'address1' =>  $request->address1
        ]);

        $person->user()->create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 3
        ]);
        session()->flash('success', 'Sign up successful!');


        return;

    }

    public function index(){
        $users = User::all();
        return view('pages.tables.user_table', ['users' => $users]);
    }
    public function topUsers(){
        $users = User::all();
        return view('home', ['users' => $users]);
    }
    public function allUsers(){
        $users = User::all();
        return view('home', ['users' => $users]);
    }
    public function userDetails($userId)
    {
        return User::find($userId);
    }
    
    public function addUser(Request $request)
    {

        $person = People::create([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'phone_number' =>  $request->phone_number,
            'address1' =>  $request->address1
        ]);

        $person->user()->create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'active' => 1
        ]);
        
        // Add Filtering
        session()->flash('success', 'User Successfully Added!');

        return;

    }

    public function destroyUser($id)
    {
        $user = User::find($id); // find the post with an id of 1
        $user->delete();

        // Delete Filtering
        session()->flash('success', 'User Successfully Deleted!');
        return;
    }
}
