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
        'cargo',
        'superior',
        'area',
        'foto',
        'firstname',
        'lastname',
        'ci',
        'email',        
        'celular',
        'ingreso',                
        'genero',        
        'password',       
    ];
    protected $guarded = [        
    ];
}
