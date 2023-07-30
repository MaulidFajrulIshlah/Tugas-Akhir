<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Definisikan kebijakan untuk model User
        Gate::define('admin', function ($user) {
            $user = Auth::user();
            return $user->id_role === 1;
        });
        Gate::define('dekanat-tendik', function ($user, $fakultas) {
            $user = Auth::user();
            $allowedRole = [2, 3];
            $userRole = $user->id_role;
            $userFakultas = $user->id_fakultas;

            return in_array($userRole, $allowedRole) && $userFakultas == $fakultas;
        });
        Gate::define('prodi', function ($user, $prodi) {
            $user = Auth::user();
            $allowedRole = [4, 5];
            $userRole = $user->id_role;
            $userProdi = $user->id_prodi;

            return in_array($userRole, $allowedRole) && $userProdi == $prodi;
        });
        Gate::define('dekanat-tendik-pascasarjana', function ($user) {
            $user = Auth::user();
            $allowedRole = [2, 3];
            $userRole = $user->id_role;
            $userFakultas = $user->id_fakultas;

            return in_array($userRole, $allowedRole) && $userFakultas == 1;
        });
        Gate::define('dekanat-tendik-fti', function ($user) {
            $user = Auth::user();
            $allowedRole = [2, 3];
            $userRole = $user->id_role;
            $userFakultas = $user->id_fakultas;

            return in_array($userRole, $allowedRole) && $userFakultas == 4;
        });
        Gate::define('dekanat-tendik-feb', function ($user) {
            $user = Auth::user();
            $allowedRole = [2, 3];
            $userRole = $user->id_role;
            $userFakultas = $user->id_fakultas;

            return in_array($userRole, $allowedRole) && $userFakultas == 5;
        });
        Gate::define('dekanat-tendik-prodi-fh', function ($user) {
            $user = Auth::user();
            $allowedRole = [2, 3, 4, 5];
            $userRole = $user->id_role;
            $userFakultas = $user->id_fakultas;

            return in_array($userRole, $allowedRole) && $userFakultas == 6;
        });
        Gate::define('dekanat-tendik-prodi-fpsi', function ($user) {
            $user = Auth::user();
            $allowedRole = [2, 3, 4, 5];
            $userRole = $user->id_role;
            $userFakultas = $user->id_fakultas;

            return in_array($userRole, $allowedRole) && $userFakultas == 7;
        });
        Gate::define('prodi-magister-kenotariatan', function ($user) {
            $user = Auth::user();
            $allowedRole = [4, 5];
            $userRole = $user->id_role;
            $userFakultas = $user->id_fakultas;
            $userProdi = $user->id_prodi;

            return in_array($userRole, $allowedRole) && $userFakultas == 1 && $userProdi == 1;
        });
        Gate::define('prodi-magister-manajemen', function ($user) {
            $user = Auth::user();
            $allowedRole = [4, 5];
            $userRole = $user->id_role;
            $userFakultas = $user->id_fakultas;
            $userProdi = $user->id_prodi;

            return in_array($userRole, $allowedRole) && $userFakultas == 1 && $userProdi == 2;
        });
        Gate::define('prodi-magister-sainsBiomedis', function ($user) {
            $user = Auth::user();
            $allowedRole = [4, 5];
            $userRole = $user->id_role;
            $userFakultas = $user->id_fakultas;
            $userProdi = $user->id_prodi;

            return in_array($userRole, $allowedRole) && $userFakultas == 1 && $userProdi == 3;
        });
        Gate::define('prodi-magister-adminRS', function ($user) {
            $user = Auth::user();
            $allowedRole = [4, 5];
            $userRole = $user->id_role;
            $userFakultas = $user->id_fakultas;
            $userProdi = $user->id_prodi;

            return in_array($userRole, $allowedRole) && $userFakultas == 1 && $userProdi == 4;
        });
        Gate::define('prodi-doktor-sainsBiomedis', function ($user) {
            $user = Auth::user();
            $allowedRole = [4, 5];
            $userRole = $user->id_role;
            $userFakultas = $user->id_fakultas;
            $userProdi = $user->id_prodi;

            return in_array($userRole, $allowedRole) && $userFakultas == 1 && $userProdi == 5;
        });
        Gate::define('prodi-fti-ti', function ($user) {
            $user = Auth::user();
            $allowedRole = [4, 5];
            $userRole = $user->id_role;
            $userFakultas = $user->id_fakultas;
            $userProdi = $user->id_prodi;

            return in_array($userRole, $allowedRole) && $userFakultas == 4 && $userProdi == 10;
        });
        Gate::define('prodi-fti-ip', function ($user) {
            $user = Auth::user();
            $allowedRole = [4, 5];
            $userRole = $user->id_role;
            $userFakultas = $user->id_fakultas;
            $userProdi = $user->id_prodi;

            return in_array($userRole, $allowedRole) && $userFakultas == 4 && $userProdi == 11;
        });
        Gate::define('prodi-feb-akuntansi', function ($user) {
            $user = Auth::user();
            $allowedRole = [4, 5];
            $userRole = $user->id_role;
            $userFakultas = $user->id_fakultas;
            $userProdi = $user->id_prodi;

            return in_array($userRole, $allowedRole) && $userFakultas == 5 && $userProdi == 13;
        });
        Gate::define('prodi-feb-manajemen', function ($user) {
            $user = Auth::user();
            $allowedRole = [4, 5];
            $userRole = $user->id_role;
            $userFakultas = $user->id_fakultas;
            $userProdi = $user->id_prodi;

            return in_array($userRole, $allowedRole) && $userFakultas == 5 && $userProdi == 12;
        });
    }
}
