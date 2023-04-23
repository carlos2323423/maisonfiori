<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Empleado;
use Illuminate\Http\Request;

class RedirectorController extends Controller
{
    // public function login() {
    //     //
    //     return view('login', ['title' => 'Home Page']);
    // }

    // public function register() {
    //     return view('register', ['title' => 'Home Page']);
    // }    

    public function welcome() {
        return view('welcome2', ['title' => 'Welcome']);
    }    

    public function users() {
        // selection query        
        $usuarios = User::all();        
        return view('usuarios', [
            'title' => 'Welcome',
            'usuarios' => $usuarios,
        ]);
    }    
    public function empleados() {
        $spaces = [
            'c1' => 'hotel',
            'c2' => 'nivel',
            'c3' => 'rol',
            // 'c4'=> 'foto',
            'c5' => 'nombre',
            'c6' => 'ci',
            'c7' => 'celular',
            // 'c8' => 'ingreso',
            // 'c9' => 'genero',
        ];
        // selection query                      
        $usuarios = Empleado::all();  

        return view('empleados', [
            'title' => 'Welcome',
            'usuarios' => $usuarios,
            'spaces' => $spaces,
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
