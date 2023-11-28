<?php
namespace App\Models;

use App\Models\EscalaAtributo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EscalaCalificacion extends Model
{
    use HasFactory;
    protected $fillable = [        
        'name', 
        'e1', 
        'e2', 
        'e3', 
        'e4', 
        'e5',         
    ];
    protected $guarded = [        
    ];

     // Si no quieres que Eloquent gestione automáticamente los timestamps, puedes agregar:
    // public $timestamps = false;

    // Relación con la tabla 'escala_atributo'
    public function atributoE1()
    {
        return $this->belongsTo(EscalaAtributo::class, 'e1');
    }

    public function atributoE2()
    {
        return $this->belongsTo(EscalaAtributo::class, 'e2');
    }

    public function atributoE3()
    {
        return $this->belongsTo(EscalaAtributo::class, 'e3');
    }

    public function atributoE4()
    {
        return $this->belongsTo(EscalaAtributo::class, 'e4');
    }

    public function atributoE5()
    {
        return $this->belongsTo(EscalaAtributo::class, 'e5');
    }
}
