<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // function index
    public function index()
    {
        return view('login.login');
    }

    // function authenticate
    public function authenticate(Request $request)
    {
        // validasi username dan password
        $request->validate([
            'username' => ['required', 'min:3', 'max:255'],
            'password' => 'required|min:5|max:255',
        ]);
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            //  jika authentikasi sukses
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->level == '1') {
                return redirect()->intended('/admin/dashboard');
            }
            return view('login.login');
        } else {
            return back()->with('failed', 'Gagal masuk! Silahkan coba lagi!');
        }
    }
}
