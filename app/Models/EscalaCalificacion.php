<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EscalaCalificacion extends Model
{
    use HasFactory;
    protected $fillable = [        
        'name', 
        'e1', 
        'e2', 
        'e3', 
        'e4', 
        'e5',         
    ];
    protected $guarded = [        
    ];
}
