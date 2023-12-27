<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactoresDesempeno extends Model
{
    use HasFactory;    
    protected $table = 'factoresdesempeno';

    protected $fillable = [
        'name',
        'state',
        'descripcion',
    ];

    protected $guarded = [];
    protected $casts = [
        'state' => 'boolean',
    ];
    public function preguntas()
    {
        return $this->morphMany('App\Models\Pregunta', 'areas_de_evaluacion');
    }

}        