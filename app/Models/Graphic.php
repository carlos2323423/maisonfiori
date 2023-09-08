<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graphic extends Model
{
    use HasFactory;
    
    public function getFillableFields()
    {
        return $this->getFillable();
    }
    
    protected $fillable = [        
        'id',
        'competencies',
        'competency_levels',
        'employee_skills',
        'graphical_representation',
        'description',
        'created_at',
        'updated_at',        
    ];
    protected $guarded = [        
    ];
}
