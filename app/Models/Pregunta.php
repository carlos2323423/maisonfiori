<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;        
    protected $fillable = [
        'areas_de_evaluacion_type',
        'areas_de_evaluacion_id',
        'valor',
    ];
    public function areas_de_evaluacion()
    {
        return $this->morphTo('areas_de_evaluacion');
    }

}
