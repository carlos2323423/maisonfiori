<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;
    
    protected $guarded = [];
    
    public function getFillableFields()
    {
        return $this->getFillable();
    }
    
    protected $fillable = [        
        'id',
        'lastname',
        'firstname',
        'password',
        'ci',
        'email',
        'created_at',
        'updated_at',
        'remember_token',
        'foto',
        'nivel',        
    ];
}
