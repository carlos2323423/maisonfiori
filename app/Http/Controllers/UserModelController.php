<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
// use App\Models\UserModel;
use App\Models\User;
use Illuminate\Http\Request;

class UserModelController extends Controller
{    
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

    public function index()
    {
        //
        return view('register', ['title' => 'Tareas Page']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {        
        // return $request;
        // return gettype($request);                
        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'ci' => $data['ci'],
            'email' => $data['email'],
            // 'password' => Hash::make($data['password']),
            'password' => $data['password'],
        ]);         
    }

    public function select(array $data)
    {                
        return UserModel::select([                                
            'email' => $data['email'],            
            'password' => $data['password'],
        ]);                 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store all data sent by blade
        $data = [
            'firstname' => $request->firstname,            
            'lastname' => $request->lastname,
            'ci' => $request->ci,
            'email' => $request->email,            
            'password' => $request->password,
        ];
        return $this->create($data);
    }

    public function store_register(Request $request)
    {
        // store all data sent by blade
        $data = [
            'firstname' => $request->firstname,            
            'lastname' => $request->lastname,
            'ci' => $request->ci,
            'email' => $request->email,            
            'password' => $request->password,
        ];
        return $this->create($data);
    }

    public function store_login(Request $request)
    {
        // store all data sent by blade
        $data = [                                    
            'email' => $request->email,            
            'password' => $request->password,
        ];        
        $dataUser = $this->select($data);
        return $this->authenticate($request);
        // echo ('hola soy el store de login');
        // return redirect('home');
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

        return UserModel::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'ci' => $data['ci'],
            'email' => $data['email'],
            // 'password' => Hash::make($data['password']),
            'password' => $data['password'],
        ]);         
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
    // public function update(Request $request, UserModel $userModel)
    // {
    //     //
        
    // }
    public function update(Request $request, $id)
    {
        $registro = TuModelo::find($id);
        $registro->nombre = $request->input('nombre');
        $registro->email = $request->input('email');
        $registro->save();
        return redirect('/lista-de-registros');
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
