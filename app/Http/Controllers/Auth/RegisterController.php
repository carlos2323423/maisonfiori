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
// if (Auth::check()) {
//     // The user is logged in...
// }
// Get the currently authenticated user...
$user = Auth::user();
// Get the currently authenticated user's ID...
// $id = Auth::UserID();
$id = Auth::id();
/** END ADITIONS */
class RegisterController extends Controller
{
    public const HOME = '/home';
    
    /**
    * The user has been authenticated.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  mixed  $user
    * @return mixed
    */
    protected function authenticated(Request $request, $user)
    {
        return response([
            //
        ]);
    }
    public function username()
    {
        return 'username';
    }
    protected function guard()
    {
        // return Auth::guard('guard-name');
    }
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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [            
            // 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function update(Request $request)
    {
        // $request->user() returns an instance of the authenticated user...
    }
    protected function create(array $data)
    {
        $user = User::create([                     
        // return User::create([                     
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'ci' => $data['ci'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            // 'created_at' => date('m-d-y H:i:s'),
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s')
            // 'created_at' => time(),
        ]);
        auth()->login($user);    
        return $user;    
    }
    public function redirectPath(){
        if(Auth::user()->tipo_usuario){ 
            return '/admin/panel';
        }
        return '/home';
    }

}
