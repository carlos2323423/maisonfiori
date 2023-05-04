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
   
    // protected function create(array $data)
    // {
        
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



    // protected function create(array $data)
    // {
    //     $data['password'] = Hash::make($data['password']);

    //     if ($data['foto'] && $data['foto'] instanceof UploadedFile) {
    //         $extension = $data['foto']->getClientOriginalExtension();
    //         $filename = 'foto_' . $data['nombre'] . '.' . $extension;
    //         $imagePath = $data['foto']->storeAs('avatar_img', $filename, 'public');
    //         $data['foto'] = $imagePath;
    //     }

    //     return Empleado::create($data);
    // }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'hotel' => 'required|string',
    //         'nivel' => 'required|string',
    //         'rol' => 'required|string',
    //         'foto' => 'nullable|image|max:2048',
    //         'nombre' => 'required|string',
    //         'ci' => 'required|string|unique:empleados',
    //         'email' => 'required|string|email|unique:empleados',
    //         'celular' => 'required|string|unique:empleados',
    //         'ingreso' => 'required|date',
    //         'genero' => 'required|string',
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);

    //     $data = $request->all();
    //     $this->create($data);

    //     return redirect()->route('empleados');
    // }



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
