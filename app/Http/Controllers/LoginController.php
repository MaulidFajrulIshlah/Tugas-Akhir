<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()) {
            return redirect()->intended('dashboard/beranda');
        }
        return view('login.login');
    }

    // function authenticate
    public function authenticate(Request $request)
    {
        // validasi username dan password
        $request->validate([
            'username' => ['required', 'min:3', 'max:255'],
            'password' => ['required', 'min:5', 'max:255'],
        ]);
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            //  jika authentikasi sukses
            $request->session()->regenerate();
            if (Auth::check()) {
                return redirect()->intended('dashboard/beranda');
            }
            return view('login.login');
        } else {
            return redirect('login')->with('failed', 'Gagal masuk! Silahkan coba lagi!');
        }
    }

    public function forbidden()
    {
        return view('dashboard.layouts.unauthorized');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
