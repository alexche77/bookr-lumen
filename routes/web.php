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

$app->get('/', function () {
    return $app->version();
});

//Le pasamos un parámetro normal y sencillo
$app->get('/hola[/{nombre}]', function($nombre=null){
	return 'Hola! '.$nombre;
});
