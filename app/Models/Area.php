<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    public function getFillableFields()
    {
        return $this->getFillable();
    }
    
    protected $fillable = [
        'ah_nombre',
        'ah_descripcion',
        'ah_ah_activo',
        'hotel_id',
    ];

    protected $table = 'areas';

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
    // Si decides descomentar y utilizar la relación con el manager
    // public function manager()
    // {
    //     return $this->belongsTo(Empleado::class, 'manager_id');
    // }
}
