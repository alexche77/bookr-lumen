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

$app->get('/', 'LibroController@index');
$app->group(['prefix'=>'usuario'], function ($app){

    $app->post('agregar','UserController@agregar');
    $app->post('editar/{id}','UserController@editar');
});