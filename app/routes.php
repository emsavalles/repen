<?php


Route::get('/', function(){return View::make('hello');});
/*
Route::controller('/admin', 'HomeController');
*/

Route::get('login', 'AuthController@showLogin');

// Validamos los datos de inicio de sesi�n.
Route::post('login', 'AuthController@postLogin');

// Nos indica que las rutas que est�n dentro de �l s�lo ser�n mostradas si antes el usuario se ha autenticado.
Route::group(array('before' => 'auth'), function()
{
    // Esta ser� nuestra ruta de bienvenida.
    Route::get('/admin', function()
    {
        return View::make('admin.inicio');
    });
    // Esta ruta nos servir� para cerrar sesi�n.
    Route::get('logout', 'AuthController@logOut');
});

?>