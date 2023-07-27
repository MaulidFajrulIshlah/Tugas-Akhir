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
            return $user->id_role === 1;
        });
        Gate::define('dekanat-tendik', function (User $user, $fakultas) {
            $allowedRole = [2, 3];
            $userRole = $user->id_role;
            $userFakultas = $user->id_fakultas;

            return in_array($userRole, $allowedRole) && $userFakultas == $fakultas;
        });
        Gate::define('prodi', function (User $user, $prodi) {
            $allowedRole = [4, 5];
            $userRole = $user->id_role;
            $userProdi = $user->id_prodi;

            return in_array($userRole, $allowedRole) && $userProdi == $prodi;
        });
    }
}
