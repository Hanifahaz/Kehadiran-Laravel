<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'keterangan',
    ];

    public function Kehadiran()
    {

        return $this->hasMany('App\Models\Kehadiran');
    }
    
}
