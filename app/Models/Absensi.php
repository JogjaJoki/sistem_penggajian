<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'in',
        'out',
        'keterangan'
    ];

    protected $casts = [
        'in' => 'datetime: H:i',
        'out' => 'datetime: H:i',
    ]; 

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
