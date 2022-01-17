<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('usuarios', 'UserController@getAll');

Route::get('abogados', 'AbogadosController@getAll');
Route::post('abogados', 'AbogadosController@create');
Route::put('abogados/{abogado_id}', 'AbogadosController@update');
Route::delete('abogados/{abogado_id}', 'AbogadosController@delete');

Route::get('abogados/especialidad', 'EspecialidadController@getPorEspecialidad');


Route::get('calificaciones', 'CalificacionController@getAll');
Route::get('abogados/{abogado_id}/calificaciones', 'CalificacionController@getPorAbogado');
Route::post('calificaciones', 'CalificacionController@create');

Route::post('citas', 'CitaController@create');
