<?php    
namespace App\Http\Controllers;
use App\Http\Controllers\MainparentController;
use Illuminate\Http\Request;
//START MODELOS
use App\Models\Empleado;
// use App\Models\User;
use App\Models\Usuario;
use App\Models\Pregunta;
//END MODELOS
//START TRAITS
use App\Traits\CrudmodalTrait;
use App\Traits\RedirectorTrait;
//END TRAITS
use App\Helpers\ValidationHelper;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LoginController extends Controller
{
    use CrudmodalTrait;
    use RedirectorTrait;
    
    public function login(Request $request, $tipo_tabla)
    {        
        // dd($request->all());
        $modeTable = '';
        $redir = '';        
        switch ($tipo_tabla) {
            case 'user_loginsent':                                            
                // dd("estoy por el logiin antes de redir");                
                // dd($request->email);
                try {
                    $modeTable = Usuario::where('email', $request->email)
                                    ->where('password', $request->password)
                                    ->firstOrFail();
                    
                    // Realiza las operaciones necesarias con el registro encontrado
                    
                } catch (ModelNotFoundException $exception) {
                    // Maneja la excepción si no se encuentra ningún registro
                    // Por ejemplo, puedes redirigir a una página de error o mostrar un mensaje de error
                    return redirect()->back()->with('error', 'Credenciales inválidas');                    
                }
                $viewvariables = $this->traitusuarios();
                // dd($viewvariables);
                $redir = 'welcome';
                break;
                
            case 'usuario_registerupdate':
                $modeTable = User::findOrFail($id);
                $redir = 'usuarios';
                break;
                
            case 'preguntas_registerupdate':
                $modeTable = Pregunta::findOrFail($id);
                $redir = 'preguntas';
                break;
                
            default:
                dd("Update calling method invalid table");
                break;
        }
                
        $modeTable->fill($request->all());
        
        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('avatar_img', 'public');
            $modeTable->foto = $imagePath;
        }
        
        if ($request->hasFile('password')) {
            $modeTable->password = Hash::make($request->password);
        }
                
        return redirect()->action([RedirectorController::class, $redir]);
    }
}

