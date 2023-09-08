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

class UpdateController extends Controller
{
    use CrudmodalTrait;
    use RedirectorTrait;
    
    public function update(Request $request, $tipo_tabla, $id)
    {        
        // dd($request->all());
        $modeTable = '';
        $redir = '';        
        switch ($tipo_tabla) {
            case 'empleado_registerupdate':                
                $modeTable = Empleado::findOrFail($id);                
                $imageuser = $modeTable->foto;                
                // $request->merge(['foto' => $request->hasFile('foto') ? $request->file('foto') : $imageuser]);
                // $request->merge(['foto' => $request->filled('foto') ? $request->file('foto') : $imageuser]);
                $imageuser = asset('storage/' . $imageuser);
                $validator = ValidationHelper::validator('empleado', $request->all(), false, $request);
                $viewvariables = $this->traitempleados();
                $redir = 'empleados';
                break;
                
            case 'usuario_registerupdate':
                $modeTable = Usuario::findOrFail($id);
                $imageuser = $modeTable->foto;
                // dd($imageuser);
                $imageuser = asset('storage/' . $imageuser);
                $validator = ValidationHelper::validator('usuario', $request->all(), false, $request);
                $viewvariables = $this->traitempleados();
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
                $oldData = array_merge($request->all(), ['imageuser' => $imageuser]);                  
                return redirect()->back()->withErrors($validator)->withInput($oldData);

            }
        } else {
            dd("NO EXISTE EL VALIDATOR PARA " . $tipo_tabla . " EN EL CONTROLADOR");
        }
        
        $modeTable->fill($request->all());
        
        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('avatar_img', 'public');
            $modeTable->foto = $imagePath;
            // dd($modeTable);
        }
        
        if ($request->hasFile('password')) {
            $modeTable->password = Hash::make($request->password);
        }
        
        $modeTable->save();
        $this->updateTrait($request, $modeTable);
        return redirect()->action([RedirectorController::class, $redir]);
    }
}

