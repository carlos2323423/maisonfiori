<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $fillable = [                                
        'hotel',
        'nivel',
        'rol',
        'foto',
        'nombre',
        'ci',
        'email',        
        'celular',
        'ingreso',                
        'genero',        
        'password',       
    ];
}
