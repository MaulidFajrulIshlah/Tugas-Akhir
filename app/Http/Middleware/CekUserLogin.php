<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Fakultas;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CekUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // cek autentikasi pengguna
        if (!Auth::check()) {
            return redirect('login');
        }

        // cek akses halaman pengguna
        $user = Auth::user();
        $id_role = $user->id_role;
        $id_fakultas = $user->id_fakultas;

        // memeriksa apakah id_role ada dalam daftar peran yang diizinkan
        if (in_array($id_role, $roles)) {
            // memeriksa apakah id_fakultas sesuai dengan kriteria yang diizinkan
            $list_id_fakultas = Fakultas::pluck('id')->toArray();
            if ($id_fakultas === null || in_array($id_fakultas, $list_id_fakultas)) {
                return $next($request);
            }
        }

        return redirect('forbidden');
    }
}
