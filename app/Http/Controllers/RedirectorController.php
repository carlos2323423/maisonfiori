<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RedirectorController extends Controller
{
    // public function login() {
    //     //
    //     return view('login', ['title' => 'Home Page']);
    // }

    // public function register() {
    //     return view('register', ['title' => 'Home Page']);
    // }    

    public function getTableColumns($tableName) {
        $columns = DB::getSchemaBuilder()->getColumnListing($tableName);
        // dd($columns); // Imprime el contenido de $columns y detiene la ejecución del código
        $spaces = [];                
        // foreach($columns as $i => $column) {
        //     $spaces['c' . ($i+1)] = $column;
        // }
        foreach($columns as $index => $column) {
            $spaces['c' . ($index+1)] = $column;
        }
        
        
        // dd($spaces); // Imprime el contenido de $columns y detiene la ejecución del código
        return $spaces;
    }    

    public function welcome() {
        return view('welcome2', ['title' => 'Welcome']);
    }    

    public function users() {
        $spaces = $this->getTableColumns('users');          
        // selection query        
        $list = User::all();        
        $name = 'usuario';
        return view('usuarios', [
            'title' => 'Welcome',            
            'list' => $list,
            'spaces' => $spaces,
            'route_name' => $name,
        ]);
    }    
    public function empleados() {      
        $spaces = $this->getTableColumns('empleados');          
        // $spaces = [
        //     'c1' => 'hotel',
        //     'c2' => 'nivel',
        //     'c3' => 'rol',            
        //     'c4' => 'nombre',
        //     'c5' => 'ci',
        //     'c6' => 'celular',
        //     'c7' => 'email',
        //     'c8' => 'ingreso',
        //     'c9' => 'genero',
        //     'c10'=> 'foto',
        //     'c11'=> 'password',
        // ];
        // selection query                      
        $list = Empleado::all();  
        $name = 'empleado';
        return view('empleados', [
            'title' => 'Welcome',
            'list' => $list,
            'spaces' => $spaces,
            'route_name' => $name,
        ]);
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {        
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function show(UserModel $userModel)
    {
        // selection query        
        $usuarios = User::all();
        return view('profesores.index', ['profesores' => $profesores]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function edit(UserModel $userModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserModel $userModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserModel $userModel)
    {
        //
    }
}
