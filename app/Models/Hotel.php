<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    public function getFillableFields()
    {
        return $this->getFillable();
    }
    
    protected $fillable = [
        'name',
        'direccion',
        'telefono',
        'activo',
    ];
    protected $table = 'hotels';
}
