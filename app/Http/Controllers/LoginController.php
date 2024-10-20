<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    function index(){
        return view('login');
    }
    function login(Request $request){
        $user = User::where('username',$request->username)->first();
        if($user){
            if(password_verify($request->password,$user->password)){
                $request->session()->put('username',$user->username);
                $request->session()->put('name',$user->name);
                $request->session()->put('role',$user->role);
                return redirect('dashboard');
            }else{
                return view('login',['message'=>'Password is incorrect','previous'=>$request->username]);
            }
        }else{
            return view('login',['message'=>'Username does not exist','previous'=>$request->username]);
        }
    }
    function logout(){
        session()->pull('username');
        session()->pull('name');
        session()->pull('role');
        return redirect('login');
    }

}
