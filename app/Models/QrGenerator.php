<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrGenerator extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'qr_codes';

    protected $fillable = [
        'name',
        'qr_code_data',
        'imageqr',
    ];

    // Puedes agregar relaciones u otros métodos aquí si es necesario
}
