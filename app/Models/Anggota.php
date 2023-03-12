<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = [
        'NISN',
        'nama',
        'kelas',
        'lahir',
        'alamat',
        'phone',
    ];

    public function index()
    {

        return $this->hasMany('App\Models\Anggota'); 
    }
}
