<?php    
namespace App\Http\Controllers;
use App\Http\Controllers\MainparentController;
use Illuminate\Http\Request;
//START MODELOS
use App\Models\Empleado;
use App\Models\User;
use App\Models\Pregunta;
//END MODELOS
//START TRAITS
use App\Traits\CrudmodalTrait;
use App\Traits\RedirectorTrait;
//END TRAITS
use App\Helpers\ValidationHelper;
use Illuminate\Database\Eloquent\ModelNotFoundException;
// LOGIN IMPORTS
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController1 extends Controller
{
    use CrudmodalTrait;
    use RedirectorTrait;
    // login trait
    use AuthenticatesUsers;

    public function login(Request $request)
    {   
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);        
    }

    // public function login(Request $request)
    // {                                                    
    //     // dd($request->all());
    //     $modeTable = '';
    //     $redir = '';        
    //     switch ($tipo_tabla) {
    //         case 'user_loginsent':                                            
    //             // dd("estoy por el logiin antes de redir");                
    //             // dd($request->email);
    //             try {
    //                 $modeTable = User::where('email', $request->email)
    //                                 ->where('password', $request->password)
    //                                 ->firstOrFail();
                    
    //                 // Realiza las operaciones necesarias con el registro encontrado
                    
    //             } catch (ModelNotFoundException $exception) {
    //                 // Maneja la excepción si no se encuentra ningún registro
    //                 // Por ejemplo, puedes redirigir a una página de error o mostrar un mensaje de error
    //                 return redirect()->back()->with('error', 'Credenciales inválidas');                    
    //             }
    //             $viewvariables = $this->traitusers();
    //             $redir = 'users';
    //             break;
                
    //         case 'usuario_registerupdate':
    //             $modeTable = User::findOrFail($id);
    //             $redir = 'usuarios';
    //             break;
                
    //         case 'preguntas_registerupdate':
    //             $modeTable = Pregunta::findOrFail($id);
    //             $redir = 'preguntas';
    //             break;
                
    //         default:
    //             dd("Update calling method invalid table");
    //             break;
    //     }
        
    //     // if (isset($validator)) {
    //     //     if ($validator->fails()) {                                       
    //     //         $oldData = array_merge($request->all(), ['imageuser' => $imageuser]);                  
    //     //         return redirect()->back()->withErrors($validator)->withInput($oldData);

    //     //     }
    //     // } else {
    //     //     dd("NO EXISTE EL VALIDATOR PARA " . $tipo_tabla . " EN EL CONTROLADOR");
    //     // }
        
    //     $modeTable->fill($request->all());
        
    //     if ($request->hasFile('foto')) {
    //         $imagePath = $request->file('foto')->store('avatar_img', 'public');
    //         $modeTable->foto = $imagePath;
    //     }
        
    //     if ($request->hasFile('password')) {
    //         $modeTable->password = Hash::make($request->password);
    //     }
                
    //     return redirect()->action([RedirectorController::class, $redir]);
    // }
}

