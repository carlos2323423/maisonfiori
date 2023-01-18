<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // sql editor sentences queries
    public function index()
    {
        return view('home');
    }

    public function insert() {
        $UserModel = new UserModel();
        $UserModel->insert();
        echo "Recod inserted";
    }

    public function edit () {
        $UserModel = new UserModel();
        $UserModel->edit();
        echo "Recod inserted";
    }

    public function read () {
        $UserModel = new UserModel();
        $UserModel->read();
        echo "Recod inserted";
    }

    public function delete () {
        $UserModel = new UserModel();
        $UserModel->delete();
        echo "Recod inserted";
    }
}
