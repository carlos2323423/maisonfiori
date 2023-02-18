<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{    
    use \Illuminate\Auth\Authenticatable;
    use HasFactory;
    public function create (array $array) {
        // $user =  DB::transaction(function() use ($array) {
        //     $user = User::create([
        //         'firstname' => $array['firstname'],
        //         'lastname' => $array['lastname'],
        //         'CI' => $array['ci'],
        //         // 'CI' => '65161651',
        //         'email' => $array['email'],                                
        //         'password' => $array['password']                
        //     ]);
        //     return $user;
        // });         
        // return $user;                        
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