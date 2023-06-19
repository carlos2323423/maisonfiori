<?php    
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\MainparentController;
use App\Models\Empleado;
use App\Traits\CrudmodalTrait;
use App\Helpers\ValidationHelper;

class Evaluacion_administradorController extends MainparentController
{        

    public function store(Request $request)
    {               
        dd('estoy en evaluacion controller');
        $empleado = new Empleado;
        // $validator = $this->validator($request->all());
        $validator = ValidationHelper::validator('empleado', $request->all());
        $viewvariables = $this->traitempleados();                 
        if ($validator->fails()) {                                    
            if (isset($validator)) {                
                return redirect()->back()->withErrors($validator)->withInput();
                // dump(session()->all());
                // return view('empleados', $viewvariables)->withErrors($validator);                                       
                // return new JsonResponse(['errors' => $validator->errors()], 422);
            } else {
                dd('NO EXITE EL VALIDATOR EN EMPLEADOS CONTROLLER');
            }            
        }               
        $this->storeTrait($request, $empleado);        
        return view('empleados', $viewvariables);           
    }    
                
    public function update(Request $request, $id)
    {    
        $empleado = Empleado::findOrFail($id);
        $empleado->fill($request->all());

        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('avatar_img', 'public');
            $empleado->foto = $imagePath;
        } else {
            $imagePath = null; // o cualquier otro valor predeterminado que desee usar
        }        
    
        $empleado->save();         
        // $usuarios->password = Hash::make($request->password);         
        return redirect()->action([RedirectorController::class, 'empleados']);             
    }

    // public function destroy(User $usuarios)
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        // $usuarios->alumnos()->detach();
        $empleado->delete();
        return redirect()->action([RedirectorController::class, 'empleados']);
    }    
}
