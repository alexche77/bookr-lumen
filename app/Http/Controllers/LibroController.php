<?php

namespace App\Http\Controllers;
use App\Libro;

class LibroController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
        $libros = Libro::where('privado',0)->get();

        return response()->json($libros);
    }
}
