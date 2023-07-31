<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use LdapRecord\Laravel\Auth\LdapAuthenticatable;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;

class User extends Authenticatable implements LdapAuthenticatable
{
    use HasApiTokens, HasFactory, Notifiable, AuthenticatesWithLdap;

    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'id_role',
        'id_fakultas',
        'id_prodi',
    ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'username_verified_at' => 'datetime',
    // ];

    // relasi tabel users dengan tabel roles
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    // relasi tabel users dengan tabel fakultas
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'id_fakultas');
    }

    // relasi tabel users dengan tabel prodi
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }
}
