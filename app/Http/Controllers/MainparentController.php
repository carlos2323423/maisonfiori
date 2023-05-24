<?php    
namespace App\Http\Controllers;
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
        // use App\Traits\ImportTrait;
        use App\Traits\CrudmodalTrait;
        use App\Traits\RedirectorTrait;
    // START HELPERS
        use App\Helpers\ValidationHelper;

class MainparentController extends Controller
{    
    use CrudmodalTrait;
    use RedirectorTrait;    

    public function otros() {
        // Get the currently authenticated user...
        $user = Auth::user();
        // Get the currently authenticated user's ID...    
        $id = Auth::id();
    }                                                  
    
    public function show($id)
    {
        // selection query        
        // $usuarios = User::all();
        $usuario = User::findOrFail($id);
        return view('profesores.editar', ['usuario' => $usuario]);        
    }     

    public function edit($id)
    {
        //        
        $usuarios = User::findOrFail($id);
        // return view('alumnos.editar', ['alumno' => $alumno]);        
        $usuarios->nombre_apellido = $request->nombre_apellido;
        $usuarios->edad = $request->edad;
        $usuarios->telefono = $request->telefono;
        $usuarios->direccion = $request->direccion;
        $usuarios->save();
        return redirect()->action([AlumnoController::class, 'index']);
    }    
            
    public function redirectPath(){
        if(Auth::user()->tipo_usuario){ 
            return '/admin/panel';
        }
        return '/home';
    }

}
