<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'bagian_id',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRole(){
        return $this->role;
    }

    public function detail(){
        return $this->hasOne(UserDetail::class, 'user_id');
    }

    public function bagian(){
        return $this->belongsTo(Bagian::class, 'bagian_id');
    }

    public function lemburs(){
        return $this->hasMany(Lembur::class, 'user_id');
    }

    public function gajis(){
        return $this->hasMany(Gaji::class, 'user_id');
    }

    public function absensi(){
        return $this->hasMany(Absensi::class, 'user_id');
    }
}
