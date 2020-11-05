<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lista;
use Auth;
use DB;

class ListaController extends Controller
{
     public function index(){
      if (Auth::check()) {
        $lista= Lista::all();
        return view('admin.lista')->with('lista',$lista);  
      }else{
        return view('auth.login');
      }
    }

            public function add(Request $request){
        try {

            $id1 = 0;
            $sql = DB::table('users')->select('id')->where('name',$request->get("nombre"))->get();
            foreach ($sql as $value) {
                $id1 = $value->id;
            }

            if($id1==0){
                $lista = new Lista();
                $lista->name = $request->get("nombre");
                $lista->email = $request->get("email");
                $lista->password = $request->get("password");
                $lista->save();
                return "0";    
            }else{
                return "2";
            }

            
        } catch (Exception $e) {
            return "1";
        }
    }


}
