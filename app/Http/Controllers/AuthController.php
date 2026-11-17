<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
    * Muestra el formulario de inicio de sesión.
    * 
    */
    public function loginForm(){
        return view('auth.acceso');
    }


    /**
     *  Procesa el inicio de sesión de un usuario.
    *
    * Valida las credenciales recibidas (email y contraseña),
    * e intenta autenticar al usuario. Si la autenticación falla,
    * redirige nuevamente al formulario de acceso con los datos
    * ingresados y un mensaje de error.
     */
        public function loginProcess(Request $request){
            $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ], [
                'email.required' => 'El email es obligatorio.',
                'email.email' => 'El email no tiene un formato válido.',
                'password.required' => 'La contraseña es obligatoria.',
            ]);

            $credentials = $request->only(['email', 'password']);

            if(!Auth::attempt($credentials)){

                $request->session()->regenerate();

                return to_route('auth.login.form')
                    ->withInput()                  //metodo que flashea los datos del formulario
                    ->with('feedback.message', 'Los datos ingresados son incorrectos')
                     ->with('feedback.status', 'danger');      
            }
           
            //Usuario autenticado
            return to_route('home')
                    ->with('feedback.message', 'Inicio de sesión con éxito.'); 
        }

    /**
    * Cierra la sesión del usuario autenticado.
    *
    * Llama al método Auth::logout() para finalizar la sesión, la invalida, regenera el token CSRF
    * y redirige al formulario de acceso con un mensaje de confirmación.
    */
        public function logout(Request $request){
            Auth::logout();

        //Medidas de seguridad para evitar ataques (Por ej: session fixation)
           $request->session()->invalidate(); // Invalidar la sesión
          $request->session()->regenerateToken(); //regenerar el Token
             
            return to_route('auth.login.form')
                    ->with('feedback.message', 'Se cerró la sesión con éxito.');      
        }
}
