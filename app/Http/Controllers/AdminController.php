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
            return redirect()->intended('admin.dashboard');
        }else{
            return back()->with('error', 'Invalid credentials. Please try again');

        }
    }
    public function showdashboard()
    {
        return view('admin.dashboard');
    }
}
