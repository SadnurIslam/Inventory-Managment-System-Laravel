<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index($username){
        $user = User::where('username',$username)->first();
        return view('profile',['user'=>$user]);
    }

    public function editProfile(){
        $user = User::where('username',session('username'))->first();
        return view('edit-profile',['user'=>$user]);
    }

    public function updateProfile(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=> 'required|email',
            'password'=> 'required|min:5|confirmed',
            'phone'=> 'required|numeric|digits_between:9,15',
        ]);

        $user = User::where('username',session('username'))->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('profile',session('username'));
    }
}
