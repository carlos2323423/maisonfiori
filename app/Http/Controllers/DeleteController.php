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

class DeleteController extends Controller
{
    use CrudmodalTrait;
    use RedirectorTrait;
    
    public function delete(Request $request, $tipo_tabla, $id)
    {        
        $modeTable = '';
        $redir = '';        
        switch ($tipo_tabla) {
            case 'empleado_registerdelete':                                
                $modeTable = Empleado::findOrFail($id);                
                $viewvariables = $this->traitempleados();
                $redir = 'empleados';
                break;
                
            case 'usuario_registerdelete':
                $modeTable = User::findOrFail($id);
                $redir = 'usuarios';
                break;
                
            case 'preguntas_registerdelete':
                $modeTable = Pregunta::findOrFail($id);
                $redir = 'preguntas';
                break;
                
            default:
                dd("Update calling method invalid table");
                break;
        }
                                
        $this->destroyTrait($modeTable);
        return redirect()->action([RedirectorController::class, $redir]);
    }
}

