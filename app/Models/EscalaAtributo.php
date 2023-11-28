<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EscalaAtributo extends Authenticatable
{
    use HasFactory;

    protected $table = 'escala_atributo';        
    
    protected $guarded = [];
    
    public function getFillableFields()
    {
        return $this->getFillable();
    }

    protected $fillable = [
        'name', 
        'state', 
        'descripcion'
    ];    
}
