<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Auth;
use DB;

class UsuarioController extends Controller
{
    public function index(Request $request){
        /* $request->user()->authorizeRoles(['admin']);*/
     
        $usuario= Usuario::all();
        return view('admin.usuario')->with('usuario',$usuario);  
     
    }

            public function add(Request $request){
        try {

            $id1 = 0;
            $sql = DB::table('users')->select('id')->where('name',$request->get("nombre"))->get();
            foreach ($sql as $value) {
                $id1 = $value->id;
            }

            if($id1==0){
                $usuario = new Usuario();
                $usuario->name = $request->get("nombre");
                $usuario->email = $request->get("email");
                $usuario->password = $request->get("password");
                $usuario->save();
                return "0";    
            }else{
                return "2";
            }

            
        } catch (Exception $e) {
            return "1";
        }
    }

    public function eliminar($id) {
    try {
        $tipo = DB::table('users')->where('id',$id)->delete(); 
        return "0";
    } catch (Exception $e) {
        return '1';  
    }
  
}
   
}


