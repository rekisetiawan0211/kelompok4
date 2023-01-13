<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $guarded = [];

    // Relasi ke Universitas
    public function universitas()
    {
        return $this->hasOne(Universitas::class, 'mahasiswa_id', 'id');
    }
    
}