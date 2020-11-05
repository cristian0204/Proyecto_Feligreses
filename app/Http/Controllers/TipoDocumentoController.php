<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoDocumento;
use Auth;
use DB;

class TipoDocumentoController extends Controller
{
    public function index( Request $request){
    	

        //$request->user()->authorizeRoles(['admin']);
        

    		$tipo = TipoDocumento::all();
    		return view('admin.tipo'/**'admin.tipo'**/)->with('tipo',$tipo);

            $tipo = TipoDocumento::all();
            return view('admin.tipo1'/**'admin.tipo'**/)->with('tipo1',$tipo);


    }

    public function add(Request $request){
    	try {



            $id1 = 0;
            $sql = DB::table('tipo_documento')->select('id')->where('nombre',$request->get("nombre"))->get();

                              

            foreach ($sql as $value) 
            {
                $id1 = $value->id;
            }

            if($id1==0){
                $tipo = new TipoDocumento();
                $tipo->nombre = $request->get("nombre");
                $tipo->description = $request->get("descripcion");
                $tipo->save();
                return "0";    
            }
            else
            {
                return "2";
            }

    		
    	} catch (Exception $e) {
    		return "1";
    	}

    }

 public function modificar(Request $request){
    try {
      $tipo = TipoDocumento::find($request->get("id"));

     $tipo->nombre = $request->get('nombre');
     $tipo->description = $request->get('descripcion');
     $tipo->update();
   
    return "0";
  
    } catch (Exception $e) {
return "1";      
    }
    
 }

 public function consultar($id){
   $sql = DB::table('tipo_documento')->where('id',$id)->get();
      return $sql;

    }


//**Funcion para eliminar funciona**/

public function eliminar($id) {
    try {
        $tipo = DB::table('tipo_documento')->where('id',$id)->delete(); 
        return "0";
    } catch (Exception $e) {
        return '1';  
    }
  
  ////redirect('tipo');

}
 
}
