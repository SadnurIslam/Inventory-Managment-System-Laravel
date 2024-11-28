<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  // Add the User model
use Illuminate\Support\Facades\Hash;  // For hashing the password
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    public function index(){
        if(request()->has('search')){
            $search = request('search');
            $users = User::where('name','LIKE','%'. $search .'%')
            ->orWhere('email','LIKE','%'. $search .'%')
            ->orWhere('phone','LIKE','%'. $search .'%')
            ->orWhere('role','LIKE','%'. $search .'%')
            ->orWhere('username','LIKE','%'. $search .'%')
            ->paginate(10);
            return view('user',['users'=>$users]);
        }
        $users = User::orderBy("created_at","desc")->paginate(10);
        return view("user",["users"=>$users]);
    }

    public function deleteUser($id)
    {
        User::destroy($id);
        return redirect()->route('users.index');
    }

    public function addUser(Request $request)
    {
        return view('add-user');
    }

    public function storeUser(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users',
            'username'=>'required|string|max:255|unique:users',
            'password'=> 'required|string|confirmed|min:5',
            'role'=> 'required|string',
            'phone'=> 'required|numeric|digits_between:9,15',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->phone = $request->phone;
        $user->added_by = session('username') ?? 'admin';
        $user->save();
        return redirect()->route('users.index');
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('edit-user', ['user' => $user]);
    }
    public function updateUser(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email,'.$request->id,
            'role'=> 'required|string',
            'phone'=> 'required|numeric|digits_between:9,15',
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->save();
        return redirect()->route('users.index');
    }


}
