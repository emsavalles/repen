<?php
class AuthController extends BaseController {

    public function showLogin()
    {
        // Verificamos que el usuario no est� autenticado
        if (Auth::check())
        {
            // Si est� autenticado lo mandamos a la ra�z donde estara el mensaje de bienvenida.
            return Redirect::to('/admin');
        }
        // Mostramos la vista login.blade.php (Recordemos que .blade.php se omite.)
        return View::make('login');
    }
    
    public function postLogin()
    {
        // Guardamos en un arreglo los datos del usuario.
        $userdata = array(
            'username' => Input::get('username'),
            'password'=> Input::get('password')
        );
        // Validamos los datos y adem�s mandamos como un segundo par�metro la opci�n de recordar el usuario.
        if(Auth::attempt($userdata))
        {
            // De ser datos v�lidos nos mandara a la bienvenida
            return Redirect::to('/admin');
        }
        // En caso de que la autenticaci�n haya fallado manda un mensaje al formulario de login y tambi�n regresamos los valores enviados con withInput().
        return Redirect::to('login')
                    ->with('mensaje_error', 'Tus datos son incorrectos')
                    ->withInput();
    }    

    public function logOut()
    {
        Auth::logout();
        return Redirect::to('login');
        //            ->with('mensaje_error', 'Tu sesi�n ha sido cerrada.');
    }
    
}//Fin AuthController
?>