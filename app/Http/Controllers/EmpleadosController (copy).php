<?php
// ESENCIASLES INPORTS
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Empleado;
// END ESENCIASLES INPORTS
// EXTAS ADITION 
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\RedirectorController;
// END EXTAS ADITION 
/** START ADITIONS */
if (Auth::check()) {
    // The user is logged in...
}
// Get the currently authenticated user...
$user = Auth::user();
// Get the currently authenticated user's ID...
// $id = Auth::UserID();
$id = Auth::id();
/** END ADITIONS */
class EmpleadosController extends Controller
{
    public const HOME = '/home';
    
    /**
    * The user has been authenticated.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  mixed  $user
    * @return mixed
    */
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

     /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function authenticate(Request $request) {          
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    protected function authenticated(Request $request, $user)
    {
        return response([
            //
        ]);
    }

    public function index()
    {
        //
        return view('register', ['title' => 'Tareas Page']);
    }

    public function username()
    {
        return 'username';
    }

    protected function guard()
    {
        // return Auth::guard('guard-name');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [            
            // 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
   
    protected function create(array $data)
    {
        $user = Empleado::create([                     
        // return User::create([        
            'hotel' => $data['hotel'],             
            'nivel' => $data['nivel'],
            'rol' => $data['rol'],
            'foto' => $data['foto'],
            'nombre' => $data['nombre'],
            'ci' => $data['ci'],             
            'email' => $data['email'],            
            'celular' => $data['celular'],
            'ingreso' => $data['ingreso'],
            'genero' => $data['genero'],
            'password' => Hash::make($data['password']),            
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s')            
        ]);
        // return route('usuarios');
        return redirect()->route('empleados');
        // auth()->login($user);    
        // return $user;    
    }

    // public function store(Request $request)
    // {        
    //     // $request->validate([
    //     //     'foto' => 'required|image|max:2048', // validación de la imagen
    //     // ]);
    
    //     // guardar la imagen en el servidor
    //     if ($request->hasFile('foto')) {
    //         // $empleado = Empleado::findOrFail($id);
    //         // $timestamp = time();

    //         $extension = $request->file('foto')->getClientOriginalExtension();
    //         // $filename = 'foto_' . $empleado->id . '_' . $nombre . '.' . $extension;
    //         // $filename = 'foto_' . $empleado->id . '_' . $request->nombre . '.' . $extension;
    //         $filename = 'foto_' . $request->nombre . '.' . $extension;
    //         $imagePath = $request->file('foto')->storeAs('avatar_img', $filename, 'public');

    //     } else {
    //         $imagePath = null; // o cualquier otro valor predeterminado que desee usar
    //     }        
    
    //     // $keys = array_keys($request->all());
        
    //     $keys = array_keys($request->except('_token'));
    //     // dd($keys);

    //     $data = [];
    //     foreach ($keys as $key) {
    //         // dd($key, $request->input($key));            
    //         $data[$key] = $request->input($key);
    //     }        

    //     // $data = [
    //     //     'hotel' => $request->hotel,            
    //     //     'nivel' => $request->nivel,
    //     //     'rol' => $request->rol,                      
    //     //     'foto' => $imagePath, // guardar la ruta de la imagen en la base de datos
    //     //     'nombre' => $request->nombre,
    //     //     'ci' => $request->ci,            
    //     //     'email' => $request->email,            
    //     //     'celular' => $request->celular,
    //     //     'ingreso' => $request->ingreso,
    //     //     'genero' => $request->genero,            
    //     //     'password' => $request->password,
    //     //     'image' => $imagePath, // guardar la ruta de la imagen en la base de datos
    //     // ];
    //     $data['foto'] = $imagePath; // guardar la ruta de la imagen en la base de datos
    //     $data['password'] = Hash::make($request->password);
    //     $data['created_at'] = date('y-m-d H:i:s');
    //     $data['updated_at'] = date('y-m-d H:i:s');
        
    //     // dd($data); // Imprime el contenido de $columns y detiene la ejecución del código
    //     // return $this->create($data);           
    //     // return $this->create($data)->withErrors(['foto' => 'Hubo un problema al subir la imagen']); 
    //     return $this->create($data); 
    // }

    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'hotel' => 'required|string',
        //     'nivel' => 'required|string',
        //     'rol' => 'required|string',
        //     'foto' => 'nullable|image|max:2048',
        //     'nombre' => 'required|string',
        //     'ci' => 'required|string|unique:empleados',
        //     'email' => 'required|string|email|unique:empleados',
        //     'celular' => 'required|string|unique:empleados',
        //     'ingreso' => 'required|date',
        //     'genero' => 'required|string',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);

        $data = $request->except(['_token', 'password_confirmation']);
        $data['password'] = Hash::make($request->password);

        if ($request->hasFile('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $filename = 'foto_' . $request->nombre . '.' . $extension;
            $imagePath = $request->file('foto')->storeAs('avatar_img', $filename, 'public');
            $data['foto'] = $imagePath;
        }

        Empleado::create($data);

        return redirect()->route('empleados');
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