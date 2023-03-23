<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
     /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'User';

    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'UserID';
     /**
    * Show a list of all of the application's users.
    *
    * @return Response
    */
    public function index()
    {
        $users = DB::table('User')->get();
        return view('home.index', ['users' => $users]);
    }
    use HasFactory;
    public function create (array $array) {

        $firstname = $array['firstname'];
        $lastname = $array['lastname'];
        $ci = $array['ci'];
        $email = $array['email'];
        $password = $array['password'];
        $date = new DateTime();
        $user = DB::connection('mysql')->insert("INSERT INTO User (LastName, FirstName, CI, Email, password)
        VALUES ('$lastname', '$firstname', '$ci', '$email', '$password');");        
        $user = [
            'firstname' => $array['firstname'],
            'lastname' => $array['lastname'],
            'CI' => $array['ci'],            
            'email' => $array['email'],                                
            'password' => $array['password'],
        ];        
        return $user;        
    }

    public function select (array $array) {
        
        $email = $array['email'];
        $password = $array['password'];
        $date = new DateTime();
        
        $user = DB::connection('mysql')->select("SELECT * FROM User WHERE (Email = '$email') AND (password = '$password');");        
        
        return $user;        
    }
}
