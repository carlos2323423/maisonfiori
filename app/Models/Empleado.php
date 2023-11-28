<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;
use App\Models\Nivel;
use App\Models\Cargo;

class Empleado extends Model
{
    use HasFactory;        
    protected $fillable = [
        'lastname',
        'firstname',
        'hotel_id',
        'nivel_id',
        'cargo_id',
        'foto',
        'ci',
        'email',
        'celular',
        'contratacion_id',
        'superior_id',
        'genero',
        'password',
    ];

    protected $guarded = [        
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'nivel_id');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id');
    }

    public function contratacion()
    {
        return $this->belongsTo(Contratacion::class, 'contratacion_id');
    }

    public function superior()
    {
        return $this->belongsTo(Empleado::class, 'superior_id');
    }
}
