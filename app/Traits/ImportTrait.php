<?php

namespace App\Traits;

// ESENCIASLES INPORTS
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;        
// use Illuminate\Support\MessageBag;
// use Illuminate\Contracts\Support\MessageProvider;
use Illuminate\Contracts\Support\MessageBag;
// START MODELS
    use App\Models\Empleado;
// START TRAITS
    use App\Traits\CrudmodalTrait;
    use App\Traits\RedirectorTrait;
// START HELPERS
    use App\Helpers\ValidationHelper;

trait ImportTrait
{
    use Request;
    // Aquí van los imports compartidos
}
