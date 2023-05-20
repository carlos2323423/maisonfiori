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
        use App\Traits\CrudmodalTrait;
        use App\Traits\RedirectorTrait;
    // START HELPERS
        use App\Helpers\ValidationHelper;

class EmpleadosController extends Controller
{
    use CrudmodalTrait;
    use RedirectorTrait;    

    public function otros() {
        // Get the currently authenticated user...
        $user = Auth::user();
        // Get the currently authenticated user's ID...    
        $id = Auth::id();
    }                                          
    
    public function store(Request $request)
    {               
        $empleado = new Empleado;
        // $validator = $this->validator($request->all());
        $validator = ValidationHelper::validator('empleado', $request->all());
        $viewvariables = $this->traitempleados();                 
        if ($validator->fails()) {                                    
            if (isset($validator)) {                
                return redirect()->back()->withErrors($validator)->withInput();
                // dump(session()->all());
                // return view('empleados', $viewvariables)->withErrors($validator);                                       
                // return new JsonResponse(['errors' => $validator->errors()], 422);
            } else {
                dd('NO EXITE EL VALIDATOR EN EMPLEADOS CONTROLLER');
            }            
        }               
        $this->storeTrait($request, $empleado);        
        return view('empleados', $viewvariables);           
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
    
    public function update(Request $request, $id)
    {    
        $empleado = Empleado::findOrFail($id);
        $empleado->fill($request->all());

        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('avatar_img', 'public');
            $empleado->foto = $imagePath;
        } else {
            $imagePath = null; // o cualquier otro valor predeterminado que desee usar
        }        
    
        $empleado->save();         
        // $usuarios->password = Hash::make($request->password);         
        return redirect()->action([RedirectorController::class, 'empleados']);             
    }

    // public function destroy(User $usuarios)
    public function destroy($id)
    {
        //
        $empleado = Empleado::findOrFail($id);
        // $usuarios->alumnos()->detach();
        $empleado->delete();
        return redirect()->action([RedirectorController::class, 'empleados']);

    }

    public function redirectPath(){
        if(Auth::user()->tipo_usuario){ 
            return '/admin/panel';
        }
        return '/home';
    }

}
