<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.pages.login');
    }
    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors(['message' => 'incorrect Email or Password!']);
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
