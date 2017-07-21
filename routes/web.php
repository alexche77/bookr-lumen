<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/','LibroController@index');

$app->get('/key', function() {
    return str_random(32);
});

$app->group(['prefix'=>'libros', 'middleware'=>'auth'], function ($app){
    $app->get('/', 'LibroController@librosUsuario');
    $app->post('/agregar','LibroController@agregar');
    $app->get('/{id}','LibroController@ver');
    $app->post('/{id}/editar','LibroController@editar');
});
$app->group(['prefix'=>'usuario', 'middleware'=>'auth'], function ($app){
    //Esta ruta muestra los datos del usuario actual
    $app->get('/','UserController@index');
//    $app->post('/agregar','UserController@agregar');
    $app->post('/editar/{id}','UserController@editar');
    $app->get('/libros','LibroController@librosUsuario');
});