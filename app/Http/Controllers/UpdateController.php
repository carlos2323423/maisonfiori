<?php    
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\MainparentController;
//START MODELOS
use App\Models\Empleado;
use App\Models\User;
use App\Models\Pregunta;
//END MODELOS
use App\Traits\CrudmodalTrait;
use App\Helpers\ValidationHelper;
class UpdateController extends MainparentController
{      
    public function update(Request $request, $id, $tipo_tabla)
    {    
      $modeTable = '';
      switch ($tipo_tabla) {
          case 'empleado_registersent':                
            $modeTable = Empleado::findOrFail($id);
            $redir = 'empreados';
            break;
          case 'usuario_registersent':
            $modeTable = User::findOrFail($id);            
            $redir = 'usuarios';
            break;
          case 'preguntas_registersent':
            $modeTable = Pregunta::findOrFail($id);            
            $redir = 'preguntas';
            break;
          default:              
            dd("Store calling method invalit table");
            break;
        }
        $modeTable->fill($request->all());
        if ($request->hasFile('foto')) {
          $imagePath = $request->file('foto')->store('avatar_img', 'public');
          $modeTable->foto = $imagePath;
        } if ($request->hasFile('password')) {
          $modeTable->password = Hash::make($request->password);
        }           
        $modeTable->save();        
        return redirect()->action([RedirectorController::class, $redir]);        
    }      
}
