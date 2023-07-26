<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CamposDeEvaluacion extends Model
{
    use HasFactory;    
    protected $fillable = [        
        'campo',
        'escala',
    ];
    protected $guarded = [        
    ];
}
