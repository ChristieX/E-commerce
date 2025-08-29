<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function showlogin()
    {
        return view('admin.admin_login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];
        if (Auth::guard('admin')->attempt($data)) {
            return redirect()->intended(route('admin.dashboard'))->with('success', 'Login successful');
        }else{
            return back()->with('error', 'Invalid credentials. Please try again');

        }
    }
    public function showdashboard()
    {
        return view('admin.dashboard');
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success', 'Logged out successfully');
    }
    public function show_forgot_password()
    {
        return view('admin.forgot_password');
    }
}
