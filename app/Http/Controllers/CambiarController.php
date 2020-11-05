<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lista;
use App\Models\Usuario;
use App\User;
use Auth;
use Hash;
use DB;

class CambiarController extends Controller
{
     public function index(){ 
      if (Auth::check()) {

       $cambiar= Lista::all();
       $usuario= Usuario::all();

        return view('admin.cambiar')->with('cambiar',$cambiar);  
        /**return view('admin.cambiar')->with('cambiar',$cambiar);  **/
      }else{
        return view('auth.login');
      }
    }

        public function cambiar_password(Request $request){
        $new = bcrypt($request->get('ConfirmarCorreo'));
        if (Hash::check($request->get('AnteriorCorreo'), Auth::User()->password)){
            $usuario=User::findOrFail(Auth::User()->id);
            $usuario->password=$new;
            $usuario->update();
            return 1;
        }else
        {
            return 0;
        }
    }


}