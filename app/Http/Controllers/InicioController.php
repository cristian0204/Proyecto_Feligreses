<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
//use App\Views\Sweet\Alert;

use alert;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\User;
use App\Role_User;
use Entrust;
use Hash;
use Mail;
use Config;
use Swift_SmtpTransport;
use Swift_MailTransport;
use Swift_Mailer;
use Swift_Message;
use Session;

class InicioController extends Controller
{
    public function index(){
    	if (Auth::check()) {
    		return view('home');	
    	}else{
    		return view('auth.login');
    	}
    	

    }

//PRUEBA PARA RECUPERAR CONTRASEÑA
    public function recuperar(Request $request){
        $correo = $request->get('email');

        $validar = DB::table('users')->select('id')->where('email',$correo)->first();

        if(empty($validar)){
 
     // alert()->error('El Email No Se Encuentra Registrado','')->persistent('Cerrar');
echo "Hola mundo";
            return  Redirect::to('/login');

        }

        $id = $validar->id;
        $contrasena = bcrypt($correo.'+123');

        $usuario=User::findOrFail($id);
        $usuario->password=$contrasena;
        $usuario->update();

        $mensaje = 'SU NUEVA CONTRASEÑA ES '.$correo.'+123';
        
        $mensajes = array(
            'mensaje' => $mensaje
        );



        $transport = (new Swift_SmtpTransport('mail.iglesiacivr.org', 465,'ssl'))
                ->setUsername('soporte@iglesiacivr.org')
                ->setPassword('Soporte');
        
        $mailer = new Swift_Mailer($transport);

        Mail::setSwiftMailer($mailer);


        Mail::send('mail.index',$mensajes, function($msj) use($correo) {
            $msj->subject('Bienvenido');
            $msj->to($correo);
        });

        return view('auth.login');
    }
}

/*****

 /PRUEBA PARA RECUPERAR CONTRASEÑA
    public function recuperar(Request $request){
        $correo = $request->get('email');

        $validar = DB::table('users')->select('id')->where('email',$correo)->first();

        if(empty($validar)){
            //alert()->error('El Email No Se Encuentra Registrado','')->persistent('Cerrar');
            return Redirect::to('/login');
        }

        $id = $validar->id;
        $contrasena = bcrypt($correo.'+123');

        $usuario=User::findOrFail($id);
        $usuario->password=$contrasena;
        $usuario->update();

        $mensaje = 'SU NUEVA CONTRASEÑA ES '.$correo.'+123';
        
        $mensajes = array(
            'mensaje' => $mensaje
        );



        $transport = (new Swift_SmtpTransport('mail.iglesiacivr.org', 465,'ssl'))
                ->setUsername('soporte@iglesiacivr.org')
                ->setPassword('Soporte');
        
        $mailer = new Swift_Mailer($transport);

        Mail::setSwiftMailer($mailer);


        Mail::send('mail.index',$mensajes, function($msj) use($correo) {
            $msj->subject('Bienvenido');
            $msj->to($correo);
        });

        return view('auth.login');
    }

******/