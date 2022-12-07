<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
class ImageController extends Controller
{
    public function index(){
        $post = Post::find(1);
        return view('welcome',compact("post"));
    }
    public function codeaguardar(Request $request){
        try {
            $post = new Post();
            $post->nombre = $request->nombre;
            // script para subir la imagen
            if($request->hasFile("imagen")){    
                // SUBIR IMÁGENES CON MOVE
                    $imagen = $request->file("imagen");
                    $nombreimagen = Str::slug($request->nombre).".".$imagen->guessExtension();
                    //$nombreimagen = $imagen->getClientOriginalName();
                    $ruta = public_path("img/post/");
        
                    $imagen->move($ruta,$nombreimagen);
                    // copy($imagen->getRealPath(),$ruta.$nombreimagen);                    
                    $post->imagen = $nombreimagen; // asignar el nombre para guardar

                // SUBIR IMÁGENES CON COPY
                    $imagen = $request->file("imagen");
                    $nombreimagen = Str::slug("nombre").time().'.'.$imagen->getClientOriginalExtension();                    
                    //$nombreimagen = $imagen->getClientOriginalName();
                    $ruta = public_path('/img/post/'.$nombreimagen);                            
                    copy($imagen->getRealPath(),$ruta);                    
                    $post->imagen = $nombreimagen; // asignar el nombre para guardar                                                                                   
            }
            $post->save();            
        }
        catch(Exception $e){
            return "Fatal error".$e->getMessage();
        }           
    }    
}