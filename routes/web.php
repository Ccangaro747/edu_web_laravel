<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});


Route::get('login', function () {
    return view('login');
});

//Estoy probando
Route::get('chat', function () {
    return view('components.chat');
});


Route::post('control', 'Web@iniciarSesion');

Route::group(['middleware' => 'UserLog'], function () {
   
    //Generales o de uso comun
    Route::get('notificaciones_todas', 'Web@notificaciones_todas');
    Route::get('vermensajecompleto/{id}', 'Web@vermensajecompleto');
    Route::get('responder/{id}', 'Web@respondermensaje');
    Route::get('inicio/{nombre}/{idperfil}', 'Web@index');
    Route::get('cerrar', 'Web@cerrarSesion');

     //Vistas alumnos    
    Route::get('materia/{materia}/{idmateria}', 'Web@mostrarMateria');
    Route::get('notificacionesmateria/{idmateria}/{tipo}', 'Web@notificacionesmateria');
    

    //Vistas padres
    Route::get('notificacionespadrestipo/{tipo}', 'Web@notificacionespadrestipo');


    //Vistas docentes
    Route::get('notificacionesdocentestipo/{tipo}', 'Web@notificacionesdocentestipo');


    //Vistas directivos
    Route::get('notificacionesdirectivostipo/{tipo}', 'Web@notificacionesdirectivostipo');

});



/* Rutas para validar datos del lado del servidor */
Route::post('guardar_respuesta', 'Web@guardarRespuesta');

