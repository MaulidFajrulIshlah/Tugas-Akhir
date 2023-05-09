<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()) {
            return redirect()->intended('beranda');
        }
        return response()->json(['status' => 'error', 'message' => 'Anda belum masuk'], 401);
        // return view('login.login');
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
            $user = Auth::user();
            if ($user) {
                return redirect()->intended('beranda');
            }
            return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 403);
        } else {
            return redirect('login')->with('failed', 'Gagal masuk! Silahkan coba lagi!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
