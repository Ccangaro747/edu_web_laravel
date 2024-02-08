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
<<<<<<< HEAD
   
    //Generales o de uso comun
    Route::get('notificaciones_todas', 'Web@notificaciones_todas');
    Route::get('vermensajecompleto/{id}', 'Web@vermensajecompleto');
    Route::get('responder/{id}', 'Web@respondermensaje');
=======
    //Vistas alumnos
>>>>>>> 9a0bbc6b4bbeb2aa9b3850babca916cd629e7bbe
    Route::get('inicio/{nombre}/{idperfil}', 'Web@index');
    Route::get('cerrar', 'Web@cerrarSesion');

     //Vistas alumnos    
    Route::get('materia/{materia}/{idmateria}', 'Web@mostrarMateria');
    Route::get('notificacionesmateria/{idmateria}/{tipo}', 'Web@notificacionesmateria');
<<<<<<< HEAD
=======

    Route::get('vermensajecompleto/{id}', 'Web@vermensajecompleto');
>>>>>>> 9a0bbc6b4bbeb2aa9b3850babca916cd629e7bbe
    

    //Vistas padres
    Route::get('notificacionespadrestipo/{tipo}', 'Web@notificacionespadrestipo');

<<<<<<< HEAD

    //Vistas docentes
    Route::get('notificacionesdocentestipo/{tipo}', 'Web@notificacionesdocentestipo');


    //Vistas directivos
    Route::get('notificacionesdirectivostipo/{tipo}', 'Web@notificacionesdirectivostipo');

=======
    Route::get('notificaciones_todas', 'Web@notificaciones_todas');


    //Vistas docentes
    Route::get('notificacionesdocentestipo/{tipo}', 'Web@notificacionesdocentestipo');
>>>>>>> 9a0bbc6b4bbeb2aa9b3850babca916cd629e7bbe
});



/* Rutas para validar datos del lado del servidor */
Route::post('guardar_respuesta', 'Web@guardarRespuesta');

