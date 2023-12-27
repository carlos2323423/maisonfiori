<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;
    protected $fillable = [                                
        'type',
        'valor',
    ];    
    public function areas_de_evaluacion()
    {
        return $this->morphTo('areas_de_evaluacion');
    }

}
