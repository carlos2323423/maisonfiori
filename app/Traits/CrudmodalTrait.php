<?php

namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

trait CrudmodalTrait
{
    public function miMetodo()
    {
        // Lógica del método
    }    

    public function storeTrait(Request $request, Model $model)    
    {                        
        $data = $request->except(['_token', 'password_confirmation']);
        $data['password'] = Hash::make($request->password);
        $nombre = $request->FirstName.$request->LastName;
        if ($request->hasFile('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $filename = 'foto_' . $nombre . '.' . $extension;
            $imagePath = $request->file('foto')->storeAs('avatar_img', $filename, 'public');
            $data['foto'] = $imagePath;
        }
        // dd($data);

        $model::create($data);        
    }
}