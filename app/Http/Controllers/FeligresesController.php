<?php
   
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feligreses;
use App\Models\TipoDocumento;
use App\Models\Estado;
use App\Models\Como;
use App\Models\Pais;
use App\Models\Municipio;
use App\Models\DatosFamiliares;
use Auth;
use DB;
use Carbon\Carbon;

class FeligresesController extends Controller
{
    
 public function index(){
    	if (Auth::check()) {
            $feligreses = Feligreses::all();
            $tipo = Feligreses::all();
    		$feligreses = DB::table('feligreses')->select('feligreses.*','estado.nombre as estado','como_llego.atraves','tipo_documento.nombre as tipo')->leftjoin('estado','estado.id','=','feligreses.estado_id')->leftjoin('como_llego','como_llego.id','=','feligreses.como_llego_id')->leftjoin('tipo_documento','tipo_documento.id','=','feligreses.tipo_documento_id')->get();
    		$tipo = TipoDocumento::all();
    		$estado = Estado::all();
    		$como= Como::all();
            $pais = Pais::all();
            $municipio = Municipio::all();
            $datosFamiliares = DatosFamiliares::all();

            $tipo1 = TipoDocumento::all();
            $estado1 = Estado::all();
            $como1= Como::all();
            $pais1 = Pais::all();
            $municipio1 = Municipio::all();
            $datosFamiliares1 = DatosFamiliares::all();


    		return view('admin.feligreses')->with('feligreses',$feligreses)->with('como',$como)->with('estado',$estado)->with('tipo',$tipo)->with('pais',$pais)->with('municipio',$municipio)
                ->with('como1',$como1)->with('estado1',$estado1)->with('tipo1',$tipo1)->with('pais1',$pais1)->with('municipio1',$municipio1);	
    	}else{
    		return view('auth.login');
    	}
    }

    public function add(Request $request){
        try{

            $id1 = 0;
            $sql = DB::table('feligreses')->select('id')->where('identificacion',$request->get("identificacion"))->where('tipo_documento_id',$request->get("tipo_documento_id"))->get();
            foreach ($sql as $value) {
                $id1 = $value->id;
            }

            if($id1==0){
                $feligreses = new Feligreses();
                $feligreses->nombre = $request->get("nombre");
                $feligreses->apellido = $request->get("apellido");
                $feligreses->identificacion = $request->get("identificacion");
                $feligreses->fecha_nacimiento = $request->get("fecha_nacimiento");
                $feligreses->movil = $request->get("movil");
                $feligreses->fijo = $request->get("fijo");
                $feligreses->correo = $request->get("correo");
                $feligreses->profesion = $request->get("profesion");
                $feligreses->genero = $request->get("genero");
                $feligreses->direccion = $request->get("direccion");
                $feligreses->tipo_documento_id = $request->get("tipo_documento_id");
                $feligreses->estado_id = $request->get("estado_id");
                $feligreses->como_llego_id = $request->get("como_llego_id");
                $feligreses->municipio_id = $request->get("municipio_id");
                $feligreses->save();
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
                $feligreses = Feligreses::find($request->get("id"));

                $feligreses->nombre = $request->get("nombre");
                $feligreses->apellido = $request->get("apellido");
                $feligreses->identificacion = $request->get("identificacion");
                $feligreses->fecha_nacimiento = $request->get("fecha_nacimiento");
                $feligreses->movil = $request->get("movil");
                $feligreses->fijo = $request->get("fijo");
                $feligreses->correo = $request->get("correo");
                $feligreses->profesion = $request->get("profesion");
                $feligreses->genero = $request->get("genero");
                $feligreses->direccion = $request->get("direccion");
                $feligreses->tipo_documento_id = $request->get("tipo_documento_id");
                $feligreses->estado_id = $request->get("estado_id");
                $feligreses->como_llego_id = $request->get("como_llego_id");
                $feligreses->municipio_id = $request->get("municipio_id");
                $feligreses->update();
   
    return "0";
  
    } catch (Exception $e) {
     return "1";      
    }
    
    }

/*PARA MODIFICAR LOS DATOS DE LOS FAMILIARES*/

    public function modFamiliar(Request $request){
    try {
            
           $datosFamiliares = DatosFamiliares::find($request->get("id"));

            
            $datosFamiliares->nombre = $request->get("nombre");
            $apellido = $request->get("apellido");
            $datosFamiliares->fecha_nacimiento = $request->get("fecha_nacimiento");
            $datosFamiliares->movil = $request->get("movil");
            $datosFamiliares->correo = $request->get("correo");
            $datosFamiliares->parentesco = $request->get("parentesco");
            $datosFamiliares->contacto_emergencia = $request->get("contacto");
             $datosFamiliares->update();
            
            
    return "0";
  
    } catch (Exception $e) {
     return "1";      
    }
    
    }

/*PARA AÑADIR LOS DATOS DE LOS FAMILIARES*/
    public function add_familiares(Request $request){
        try {
            $idf = Feligreses::select('id')->orderBy('id','desc')->first()->get();
            $id = 0;
            foreach ($idf as $value) {
                $id = $value->id;
            }

            $numFamiliares = $request->get('numDatosFamiliares');
            $nombre = $request->get("nombre_familiar");
            $apellido = $request->get("apellido_familiar");
            $fecha_nacimiento = $request->get("fecha_familiar");
            $movil = $request->get("movil_familiar");
            $correo = $request->get("correo_familiar");
            $parentesco = $request->get("parentesco_familiar");
            $contacto = $request->get("contacto_familiar");

            for ($i=0; $i < $numFamiliares; $i++) { 
                $datosFamiliares = new DatosFamiliares();
                $datosFamiliares->nombre = $nombre[$i];
                $datosFamiliares->apellido = $apellido[$i];
                $datosFamiliares->fecha_nacimiento = $fecha_nacimiento[$i];
                $datosFamiliares->movil = $movil[$i];
                $datosFamiliares->correo = $correo[$i];
                $datosFamiliares->parentesco = $parentesco[$i];
                $datosFamiliares->contacto_emergencia = $contacto[$i];
                $datosFamiliares->feligreses_id = $id;
                $datosFamiliares->save();
            }
            return "0";
        } catch (Exception $e) {
            return "1";
        }


    }

//------------------------------------------------------------------------------------




        public function add_familiaresG(Request $request){
        try {

          //  $sql = DB::table('datos_familiares')->select('id')->where('feligreses_id',$request->get("id_f"))->get();
            
            //$numFami = $request->get('numDatosFamiliaresG');
            $nombre = $request->get("nombre");
            $apellido = $request->get("apellido");
            $fecha_nacimiento = $request->get("fecha_nacimiento");
            $movil = $request->get("movil");
            $correo = $request->get("correo");
            $parentesco = $request->get("parentesco");
            $contacto = $request->get("contacto_familiar");
            $id_f= $request->get("id_f");
           //$j = 0;

           // for ($i=0; $i < $numFami; $i++) { 
                $datosFamiliares = new DatosFamiliares();
                $datosFamiliares->nombre = $nombre;
                $datosFamiliares->apellido = $apellido;
                $datosFamiliares->fecha_nacimiento = $fecha_nacimiento;
                $datosFamiliares->movil = $movil;
                $datosFamiliares->correo = $correo;
                $datosFamiliares->parentesco = $parentesco;
                $datosFamiliares->contacto_emergencia = $contacto;
                
                $datosFamiliares->feligreses_id = $id_f;
                $datosFamiliares->save();
               // $j++;
          //  }
            return "0";
        } catch (Exception $e) {
            return "1";
        }


    }

    //--------------------------------------------

    public function departamento($id){
        $sql = DB::table('departamento')->where('pais_id',$id)->get();
        return $sql;
    }


    public function municipio($id){
        $sql = DB::table('municipio')->where('departamento_id',$id)->get();
        return $sql;
    }

    public function tablaContactos($id){
        $sql = DB::table('datos_familiares')->where('feligreses_id',$id)->get();
        return $sql;
    }

    public function consultar($id){
 
         $feligreses = DB:: table ('feligreses')->select('feligreses.*','tipo_documento.id as tipo_documento','como_llego.id as como_llego','estado.id as estado','municipio.id as municipio','departamento.id as departamento','pais.id as pais')->join('tipo_documento','tipo_documento.id','=','feligreses.tipo_documento_id')->join('como_llego','como_llego.id','=','feligreses.como_llego_id')->join('estado','estado.id','=','feligreses.estado_id')->join('municipio','municipio.id','=','feligreses.municipio_id')->join('departamento','departamento.id','=','municipio.departamento_id')->join('pais','pais.id','=','departamento.pais_id')->where('feligreses.id',$id)->get();
         return $feligreses;
        
    }


    public function consulta($id){

         $datosFamiliares = DB::table ('datos_familiares')->select('datos_familiares.*','feligreses.id as feligreses')->join('feligreses','feligreses_id','=','datos_familiares.feligreses_id')->where('datos_familiares.id',$id)->get();
        
         return $datosFamiliares;
        
    }

//**Funcion para eliminar funciona**/

    public function eliminar($id) {
    try {
        $feligreses = DB::table('feligreses')->where('id',$id)->delete(); 
        return "0";
    } catch (Exception $e) {
        return '1';   
    }
  
}


    public function eliFamiliar($id) {
    try {
        $datosFamiliares = DB::table('datos_familiares')->where('id',$id)->delete(); 
        return "0";
    } catch (Exception $e) {
        return '1';  
    }
  
    }

}
