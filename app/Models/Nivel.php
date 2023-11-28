<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    public function getFillableFields()
    {
        return $this->getFillable();
    }
    
    protected $fillable = [
        'nombre',
        'descripcion',
        'puntos_requeridos',
        'state',
    ];

    protected $table = 'niveles';
}
