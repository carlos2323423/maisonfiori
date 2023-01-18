<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
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