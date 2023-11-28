<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area;

class Cargo extends Model
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
        'salario',
        'area_id',
        'hotel_id',
    ];

    protected $table = 'cargos';
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}
