<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

                return to_route('auth.login.form')
                    ->withInput()                  //metodo que flashea los datos del formulario
                    ->with('feedback.message', 'Los datos ingresados son incorrectos')
                     ->with('feedback.status', 'danger');      
            }

             //Usuario autenticado
             $request->session()->regenerate();

           
            return to_route('home')
                    ->with('feedback.message', 'Inicio de sesión con éxito.'); 
        }


    /**
     * Mostrar el formulario de registro de usuarios.
     */  
        public function registerForm(){
        return view('auth.registro');
    }


/**
 * Registro de un usuario nuevo.
 *
 * Valida los datos recibidos y crea el usuario con la contraseña hasheada.
 * El rol no lo dice el formulario. La base asigna por defecto el de usuario común.
 * 
 * Redirige al formulario de acceso con un mensaje de confirmación.
 * 
 */
        public function registerProcess(Request $request){
            $request->validate([
                'name' => ['required'],
                'email' => ['required', 'email', 'unique:users,email'],
                'password' => ['required', 'min:8'],
            ], [
                'name.required' => 'El nombre es obligatorio.',
                'email.required' => 'El email es obligatorio.',
               'email.email' => 'El email no tiene un formato válido.',
               'email.unique' => 'Ya existe una cuenta con ese email.',
                'password.required' => 'La contraseña es obligatoria.',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            ]);

            $data = $request->only(['name', 'email', 'password']);


            $data['password'] = Hash::make($data['password']);

            User::create($data);

            return to_route('auth.login.form')
                    ->with('feedback.message', 'Tu cuenta se creó con éxito. Ya podés ingresar.');
                    
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
