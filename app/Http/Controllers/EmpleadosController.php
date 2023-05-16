<?php
    // ESENCIASLES INPORTS
        namespace App\Http\Controllers;
        use Illuminate\Http\Request;
        use App\Models\Empleado;
    // END ESENCIASLES INPORTS
    // EXTAS ADITION 
        use Illuminate\Support\Facades\Auth;
        use App\Providers\RouteServiceProvider;
        use Illuminate\Support\Facades\Hash;
        // use Illuminate\Validation\Validator;
        use Illuminate\Support\Facades\Validator;        
        // use Illuminate\Support\MessageBag;
        use Illuminate\Contracts\Support\MessageProvider;
        use Illuminate\Contracts\Support\MessageBag;
        // START TRAITS        
        use App\Traits\CrudmodalTrait;        
        use App\Traits\RedirectorTrait;
        // END TRAITS
    // END EXTAS ADITION     

class EmpleadosController extends Controller
{
    use CrudmodalTrait;
    use RedirectorTrait;

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }                

    public function otros() {
        // Get the currently authenticated user...
        $user = Auth::user();
        // Get the currently authenticated user's ID...    
        $id = Auth::id();
    }                                      

    protected function validator(array $data)
    {
        $messages = [
            'FirstName.required' => 'El campo nombre es requerido',
            'LastName.required' => 'El campo apellido es requerido',
            'celular.required' => 'El campo celular es requerido',
            'celular.unique' => 'El número de celular ya está en uso',
            'ci.required' => 'El campo CI es requerido',
            'ci.unique' => 'El número de CI ya está en uso',
            'email.required' => 'El campo email es requerido',
            'email.email' => 'El formato de email no es válido',
            'email.unique' => 'El email ya está en uso',
            'genero.required' => 'El campo género es requerido',
            'hotel.required' => 'El campo hotel es requerido',
            'ingreso.required' => 'El campo ingreso es requerido',
            'ingreso.date' => 'El formato de fecha de ingreso no es válido',
            'nivel.required' => 'El campo nivel es requerido',
            'rol.required' => 'El campo rol es requerido',
            'foto.image' => 'El archivo debe ser una imagen',
            'foto.max' => 'El tamaño máximo del archivo es 2MB',
            'password.required' => 'El campo contraseña es requerido',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'La confirmación de contraseña no coincide',
        ];
    
        return Validator::make($data, [
            'FirstName' => ['required', 'string', 'max:255'],
            'LastName' => ['required', 'string', 'max:255'],
            'celular' => 'required|string|unique:empleados',
            'ci' => 'required|string|unique:empleados',
            'email' => 'required|string|email|unique:empleados',
            'genero' => 'required|string',
            'hotel' => 'required|string',
            'ingreso' => 'required|date',
            'nivel' => 'required|string',
            'rol' => 'required|string',
            'foto' => 'nullable|image|max:2048',            
            'password' => 'required|string|min:8|confirmed',
        ], $messages);
    }





   
    // protected function create(array $data)
    // {
        
    // }
    
    public function store(Request $request)
    {       
        // dd($request->all());              
        $empleado = new Empleado;
        $validator = $this->validator($request->all());
        $viewvariables = $this->traitempleados();                 
        if ($validator->fails()) {
            // dd(redirect()->back()->withErrors($validator)->withInput());
            // return redirect()->back()->withErrors($validator)->withInput();            
            // return redirect()->route('empleados')->withErrors($validator)->withInput();
            
            // $errors = $validator->errors();
            // dd($errors->all(), $errors->keys());
            // return view('empleados')->withErrors($validator)->withInput();            
            
            if (isset($validator)) {
                // $viewvariables['errors'] = $validator->errors();
                // dd($viewvariables['errors']);
                return view('empleados', $viewvariables)->withErrors($validator)->withInput();   
                // return view('empleados', $viewvariables)->withInput();   
                // return view('empleados', $viewvariables)->withErrors($viewvariables['errors'])->withInput();
                // return view('empleados', $viewvariables);           
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
