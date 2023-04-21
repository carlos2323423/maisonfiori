<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $fillable = [        
        'rol',
        'hotel',
        'nombre',
        'apellido',
        'ci',
        'edad'.
        'fecha_nacimiento',
        'nivel',
        'celular',
        'direccion',
        'ingreso'.           
        'foto',
        'genero',        
    ];
}
