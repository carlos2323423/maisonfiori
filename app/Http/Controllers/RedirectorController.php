<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class RedirectorController extends Controller
{
    public function login() {
        //
        return view('login', ['title' => 'Home Page']);
    }

    public function register() {
        return view('register', ['title' => 'Home Page']);
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {        
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function show(UserModel $userModel)
    {
        //
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
    public function update(Request $request, UserModel $userModel)
    {
        //
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
