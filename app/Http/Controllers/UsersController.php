<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function index() {        
        return view('usuarios');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            return redirect()->intended('/dashboard');
        } else {
            // Autenticación fallida
            return redirect()->back()->withInput()->withErrors(['email' => 'Credenciales inválidas']);
        }
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

