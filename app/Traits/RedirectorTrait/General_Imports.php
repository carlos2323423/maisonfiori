<?php    
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
    return $sentences = [
            // Esenciales Imports
            Request::class,
            Auth::class,
            RouteServiceProvider::class,
            Hash::class,
            Validator::class,
            MessageBag::class,

            // Start Models
            Empleado::class,

            // Start Traits
            CrudmodalTrait::class,
            RedirectorTrait::class,

            // Start Helpers
            ValidationHelper::class,
        ];