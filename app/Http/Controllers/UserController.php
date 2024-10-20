<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  // Add the User model
use Illuminate\Support\Facades\Hash;  // For hashing the password
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function deleteUser(Request $request)
    {
        User::where('username', $request->delete)->delete();
        return redirect('user')->with('message', 'User deleted successfully');
    }
    public function getUser()
    {
        $users = User::all();
        return view('user', ['users' => $users]);
    }
    public function addUser(Request $request)
    {
        if(isset($request->edit)){
            return redirect('user')->with('message', 'User added successfully');
        }
        if(isset($request->delete)){
            User::where('username', $request->delete)->delete();
            return redirect('dashboard')->with('message', 'User deleted successfully');
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);  // Hash the password
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->save();
        return redirect('user')->with('message', 'User added successfully');
    }
    public function editUser($id)
    {
        $user = User::where('id', $id)->first();
        return view('edit-user', ['user' => $user]);
    }
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->save();
        return redirect('user');
    }

    public function search(Request $request)
    {
        $users = User::where('name', 'like', '%'.$request->search.'%')->get();
        return view('user', ['users' => $users]);
    }
}
