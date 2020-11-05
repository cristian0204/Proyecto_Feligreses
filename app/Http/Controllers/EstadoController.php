<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;
use Auth;
use DB;

 
class EstadoController extends Controller
{

     public function index(){
    	if (Auth::check()) {
    		$estado = Estado::all();
    		return view('admin.estado')->with('estado',$estado);	
    	}else{
    		return view('auth.login');
    	}
    }

      public function add(Request $request){
        try {

            $id1 = 0;
            $sql = DB::table('estado')->select('id')->where('nombre',$request->get("nombre"))->get();
            foreach ($sql as $value) {
                $id1 = $value->id;
            }

            if($id1==0){
                $estado = new Estado();
                $estado->nombre = $request->get("nombre");
                $estado->description = $request->get("descripcion");
                $estado->save();
                return "0";    
            }else{
                return "2";
            }

            
        } catch (Exception $e) {
            return "1";
        }
    }


    public function modificar(Request $request){
    try {
      $estado = Estado::find($request->get("id"));

     $estado->nombre = $request->get('nombre');
     $estado->description = $request->get('descripcion');
     $estado->update();
   
    return "0";
  
    } catch (Exception $e) {
    return "1";      
    }
    
    }


    public function consultar($id){
        $sql = DB::table('estado')->where('id',$id)->get();
        return $sql;
    }


    public function eliminar($id) {
    try {
        $estado = DB::table('estado')->where('id',$id)->delete(); 
        return "0";
    } catch (Exception $e) {
        return '1';  
    }

    }


  
}
