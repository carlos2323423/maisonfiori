<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contratacion extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    public function getFillableFields()
    {
        return $this->getFillable();
    }
    
    protected $fillable = [
        'fecha_contratacion',
        'contexto_id',
    ];

    protected $table = 'contrataciones';

    public function contexto()
    {
        return $this->belongsTo(ContextoContratacion::class, 'contexto_id');
    }
}
