<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

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

        $credentials = [
            'uid' => $request->username,
            'password' => $request->password,
            'fallback' => [
                'username' => $request->username,
                'password' => $request->password,
            ],
        ];

        // jika autentikasi tidak sesuai dengan server ldap atau tidak
        if (!Auth::attempt($credentials)) {
            return redirect('login')->with('failed', 'Gagal masuk! Silahkan coba lagi!');
        }

        // jika autentikasi berhasil
        $user = Auth::user();

        // simpan data dalam session
        $request->session()->put([
            'users' => $user->username,
            'id_role' => $user->id_role,
            'id_fakultas' => $user->id_fakultas,
            'id_prodi' => $user->id_prodi,
        ]);

        // dd($request);

        // membuat ulang id session
        $request->session()->regenerate();

        if ($user->id_role === null) {
            // Jika id_role masih kosong, alihkan ke halaman "unauthorized"
            Auth::logout();

            $request->session()->regenerateToken();

            return redirect('forbidden');
        }

        // Redirect  ke halaman "dashboard/beranda"
        return new RedirectResponse('dashboard/beranda');
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
