<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    //
    public function showlogin(){
        return view('login');
    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('account.dashboard'))
            ->with('success','You have Successfully loggedin');
        }
        else{
            return redirect("account.login")->with('error','Invalid credentials! please try again.');
        }
    }
    public function dashboard(){
        if(Auth::check()){
            return view('dashboard');
        }
        return redirect("account.login")->with('error','You are not allowed to access');
    }
    public function logout(request $request){
        Auth::logout();
        $request->session()->invalidate(); 
        $request->session()->regenerateToken();
        return redirect(route('account.login'))->with('success','You have logged out successfully');
    }
    public function showregister(){
        return view('register');
    }
    public function register(Request $request){
        $validate = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'phone_no'=>'required',
            'password'=>'required|min:6|confirmed'
        ]);
        $user = User::create($validate);
        Auth::login($user);
        return redirect("dashboard")->with('success','You have registered successfully');
    }
}
