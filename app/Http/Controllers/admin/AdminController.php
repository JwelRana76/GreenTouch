<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('backend.login');
    }

    public function check(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $cred = $request->only('email','password');
        if (Auth::guard('admin')->attempt($cred)) {
            return redirect()->route('admin.home');
        }
    }

    public function index()
    {
        return view('backend.index');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
