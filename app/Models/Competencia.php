<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    use HasFactory;    
    protected $table = 'competencias';

    protected $fillable = [
        'name',
        'state',
        'descripcion',
    ];

    protected $casts = [
        'state' => 'boolean',
    ];

    // Definición de la relación polimórfica inversa
    public function preguntas()
    {
        return $this->morphMany('App\Models\Pregunta', 'areas_de_evaluacion');
    }

}
