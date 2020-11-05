<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;
use App\Models\Departamento;
use App\Models\Pais;
use Auth;
use DB;

class MunicipioController extends Controller
{
    
       public function index(){
    	if (Auth::check()) {
    		$municipio = Municipio::all();

        $municipio = DB:: table ('municipio')->select('municipio.*','pais.nombre as pais','departamento.nombre as departamento')->join('departamento','departamento.id','=','municipio.departamento_id')->join('pais','pais.id','=','departamento.pais_id')->get();



            
    		$pais = Pais::all();
    		$departamento = Departamento::all();
            $pais1 = Pais::all();
            $departamento1 = Departamento::all();

    		
    		return view('admin.municipio')->with('municipio',$municipio)->with('pais',$pais)->with('departamento',$departamento)->with('departamento1',$departamento1)->with('pais1',$pais1);	
    	}else{
    		return view('auth.login');
    	}
    }


     public function add(Request $request){
        try {

            $id1 = 0;
            $sql = DB::table('municipio')->select('id')->where('nombre',$request->get("nombre"))->where('departamento_id',$request->get("departamento_id"))->get();
            foreach ($sql as $value) {
                $id1 = $value->id;
            }

            if($id1==0){
                $municipio = new Municipio();
                $municipio->nombre = $request->get("nombre");
                $municipio->departamento_id = $request->get("departamento_id");
                
                $municipio->save();
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
      $municipio = Municipio::find($request->get("id"));

     $municipio->nombre = $request->get('nombre');
     $municipio->departamento_id = $request->get("departamento_id");
     $municipio->update();
   
    return "0";
  
    } catch (Exception $e) {
     return "1";      
    }
    
    }


      public function departamento($id){
        $sql = DB::table('departamento')->where('pais_id',$id)->get();
        return $sql;
    }


    public function municipio($id){
        $sql = DB::table('municipio')->where('departamento_id',$id)->get();
        return $sql;
    }


     public function consultar($id){
         $municipio = DB:: table ('municipio')->select('municipio.*','pais.id as pais','departamento.id as departamento')->join('departamento','departamento.id','=','municipio.departamento_id')->join('pais','pais.id','=','departamento.pais_id')->where('municipio.id',$id)->get();

      return $municipio;
   
    }


    public function eliminar($id) {
    try {
        $tipo = DB::table('municipio')->where('id',$id)->delete(); 
        return "0";
    } catch (Exception $e) {
        return '1';  
    }
  
}
}
