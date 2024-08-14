<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tunjangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rate',
    ];

    public function user(){
        return $this->belongsToMany(User::class, 'tunjangan_users', 'tunjangan_id', 'user_id');
    }
}
