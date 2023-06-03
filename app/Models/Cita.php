<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'hora',
        'es_veterinaria_estetica',
        'lugar',
        'nombre_mascota',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}


