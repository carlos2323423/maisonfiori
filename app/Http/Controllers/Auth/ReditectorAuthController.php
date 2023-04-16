<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
/** START ADITIONS */
use Illuminate\Support\Facades\Auth;

class ReditectorAuthController extends Controller
{
    //
    public function users() {
        return view('auth.usuarios', ['title' => 'Welcome']);
        // return route('register');
    }    
}
