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

class UpdateController extends Controller
{
    use CrudmodalTrait;
    use RedirectorTrait;
    
    public function update(Request $request, $tipo_tabla, $id)
    {        
        $modeTable = '';
        $redir = '';        
        switch ($tipo_tabla) {
            case 'empleado_registerupdate':                
                $request->merge(['foto' => $request->filled('foto') ? $request->file('foto') : null]);
                $modeTable = Empleado::findOrFail($id);                
                $imageuser = $modeTable->foto;
                $imageuser = asset('storage/' . $imageuser);
                $validator = ValidationHelper::validator('empleado', $request->all());
                $viewvariables = $this->traitempleados();
                $redir = 'empreados';
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
        
        if (isset($validator)) {
            if ($validator->fails()) {       
                // dd($imageuser);         
                return redirect()->back()->withErrors($validator)->withInput(['imageuser' => $imageuser]);
            }
        } else {
            dd("NO EXISTE EL VALIDATOR PARA " . $tipo_tabla . " EN EL CONTROLADOR");
        }
        
        $modeTable->fill($request->all());
        
        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('avatar_img', 'public');
            $modeTable->foto = $imagePath;
        }
        
        if ($request->hasFile('password')) {
            $modeTable->password = Hash::make($request->password);
        }
        
        $modeTable->save();
        $this->updateTrait($request, $modeTable);
        return redirect()->action([RedirectorController::class, $redir]);
    }
}

