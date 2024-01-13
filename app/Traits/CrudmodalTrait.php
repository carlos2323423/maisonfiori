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
    public function configure_request_to_data (Request $request) {
        $data = $request->except(['_token', 'password_confirmation']);
        $data['password'] = Hash::make($request->password);
        $nombre = $request->FirstName . $request->LastName;
        if ($request->hasFile('foto')) {
            // dd('estoy dentro del crud de la dabase');
            $extension = $request->file('foto')->getClientOriginalExtension();
            $filename = 'foto_' . $nombre . '.' . $extension;
            $imagePath = $request->file('foto')->storeAs('avatar_img', $filename, 'public');
            $data['foto'] = $imagePath;
        }
        // dd($data);
        return $data;
    }
    public function storeTrait($data, Model $model)
    {        
        $model::create($data);
    }

    public function updateTrait(Request $request, Model $model)    
    {                                
        $model->fill($request->all());
        if ($request->hasFile('foto')) {
          $imagePath = $request->file('foto')->store('avatar_img', 'public');
          $model->foto = $imagePath;
        } if ($request->hasFile('password')) {
          $model->password = Hash::make($request->password);
        }                   
        // dd($model);
        $model->save();        
    }

    public function destroyTrait(Model $model)
    {
        $model->delete();
    }
}
