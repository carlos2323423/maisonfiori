<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model
{        
    use HasFactory;
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
    protected $fillable = [
        'name',
        'email',
        'password',
        'tipo_usuario'
    ];
    public function index()
    {
        $users = DB::table('User')->get();
        return view('home.index', ['users' => $users]);
    }
    public function create (array $array) {      
        $created_at = $array['created_at'];
        $updated_at = $array['updated_at'];
        $firstname = $array['firstname'];
        $lastname = $array['lastname'];
        $ci = $array['ci'];
        $email = $array['email'];
        $password = $array['password'];
        $date = new DateTime();
        $user = DB::connection('mysql')->insert("INSERT INTO users (LastName, FirstName, CI, Email, password, created_at, updated_at)
        VALUES ('$lastname', '$firstname', '$ci', '$email', '$password', '$created_at', '$updated_at');");        
        $user = [
            'firstname' => $array['firstname'],
            'lastname' => $array['lastname'],
            'CI' => $array['ci'],            
            'email' => $array['email'],                                
            'password' => $array['password'],
        ];        
        return $user;        
    }

    public function edit () {
        $date = new DateTime();     
        DB::connection('main')->update("UPDATE User SET FirstName = 'Alfred Schmidt', LastName = 'Frankfurt' WHERE UserID = 1;");
    }

    public function read () {
        $date = new DateTime();     
        DB::connection('main')->insert("select * from User;");
    }

    public function delete () {
        $date = new DateTime();     
        DB::connection('main')->insert("DELETE FROM User WHERE UserID = 1;");
    }
}