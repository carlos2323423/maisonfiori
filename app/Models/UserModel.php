<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class UserModel extends Model implements Authenticatable
{    

    //use Illuminate\Contracts\Auth\Authenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'ci', 'email', 'password',
    ];

     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    use \Illuminate\Auth\Authenticatable;
    use AuthenticableTrait;
    use HasFactory;

    public function posts()
        {

            return $this->hasMany('App\Post');
        }

    public function likes()
        {
            return $this->hasMany('App\Like');
        }

    public function insert () {
        $date = new DateTime();     
        DB::connection('main')->insert("INSERT INTO User (UserID, LastName, FirstName, CI, Email, password)
        VALUES (1, 'Vasquez', 'Carlos', '6550387', 'fiorimaison36@gmail.com', 'password');");
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