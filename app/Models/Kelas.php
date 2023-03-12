<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelas',
    ];

    public function Anggota()
    {

        return $this->hasMany(Anggota::class);
    }

    public function Kehadiran()
    {

        return $this->hasMany(Kehadiran::class);
    }
}
