<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model 
{
    protected $table = "productos";
    protected $fillable  = ["nombre","img","stock","codigo"];
}