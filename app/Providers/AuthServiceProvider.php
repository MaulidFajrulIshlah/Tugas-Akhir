<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
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
        Gate::define('admin', function (User $user) {
            return $user->id_jabatan === 1;
        });
        Gate::define('dekanat-pascasarjana', function (User $user) {
            $allowedJabatan = [2, 3, 16];
            return in_array($user->id_jabatan, $allowedJabatan);
        });
        Gate::define('dekanat-fk', function (User $user) {
            $allowedJabatan = [4, 5, 17];
            return in_array($user->id_jabatan, $allowedJabatan);
        });
        Gate::define('dekanat-fkg', function (User $user) {
            $allowedJabatan = [6, 7, 18];
            return in_array($user->id_jabatan, $allowedJabatan);
        });
        Gate::define('dekanat-fti', function (User $user) {
            $allowedJabatan = [8, 9, 19];
            return in_array($user->id_jabatan, $allowedJabatan);
        });
        Gate::define('dekanat-feb', function (User $user) {
            $allowedJabatan = [10, 11, 20];
            return in_array($user->id_jabatan, $allowedJabatan);
        });
        Gate::define('dekanat-fh', function (User $user) {
            $allowedJabatan = [12, 13, 21];
            return in_array($user->id_jabatan, $allowedJabatan);
        });
        Gate::define('dekanat-fpsi', function (User $user) {
            $allowedJabatan = [14, 15, 22];
            return in_array($user->id_jabatan, $allowedJabatan);
        });
        Gate::define('dekanat-tendik', function (User $user, $fakultas) {
            $allowedRole = ['Dekanat Fakultas', 'Tendik'];
            return in_array($user->id_jabatan, $allowedRole) && $user->id_fakultas == $fakultas;
        });
        Gate::define('prodi-magister-kenotariatan', function (User $user) {
            $allowedJabatan = [23, 26];
            return in_array($user->id_jabatan, $allowedJabatan);
        });
        Gate::define('prodi-magister-manajemen', function (User $user) {
            $allowedJabatan = [25, 24];
            return in_array($user->id_jabatan, $allowedJabatan);
        });
        Gate::define('prodi-magister-sainsBiomedis', function (User $user) {
            $allowedJabatan = [27, 28];
            return in_array($user->id_jabatan, $allowedJabatan);
        });
        Gate::define('prodi-magister-adminRS', function (User $user) {
            $allowedJabatan = [29, 30];
            return in_array($user->id_jabatan, $allowedJabatan);
        });
        Gate::define('prodi-doktor-sainsBiomedis', function (User $user) {
            $allowedJabatan = [31, 32];
            return in_array($user->id_jabatan, $allowedJabatan);
        });
        Gate::define('prodi-kedokteran', function (User $user) {
            $allowedJabatan = [33, 34];
            return in_array($user->id_jabatan, $allowedJabatan);
        });
        Gate::define('prodi-profesi-dokter', function (User $user) {
            $allowedJabatan = [35, 36];
            return in_array($user->id_jabatan, $allowedJabatan);
        });
        Gate::define('prodi-kedokteranGigi', function (User $user) {
            $allowedJabatan = [37, 38];
            return in_array($user->id_jabatan, $allowedJabatan);
        });
        Gate::define('prodi-profesi-kedokteranGigi', function (User $user) {
            $allowedJabatan = [39, 40];
            return in_array($user->id_jabatan, $allowedJabatan);
        });
        Gate::define('prodi-ti', function (User $user) {
            $allowedJabatan = [41, 42];
            return in_array($user->id_jabatan, $allowedJabatan);
        });
        Gate::define('prodi-ip', function (User $user) {
            $allowedJabatan = [43, 44];
            return in_array($user->id_jabatan, $allowedJabatan);
        });
        Gate::define('prodi-manajemen', function (User $user) {
            $allowedJabatan = [45, 46];
            return in_array($user->id_jabatan, $allowedJabatan);
        });
        Gate::define('prodi-akuntansi', function (User $user) {
            $allowedJabatan = [47, 48];
            return in_array($user->id_jabatan, $allowedJabatan);
        });
        Gate::define('prodi-hukum', function (User $user) {
            $allowedJabatan = [49, 50];
            return in_array($user->id_jabatan, $allowedJabatan);
        });
        Gate::define('prodi-psikologi', function (User $user) {
            $allowedJabatan = [51, 52];
            return in_array($user->id_jabatan, $allowedJabatan);
        });
    }
}
