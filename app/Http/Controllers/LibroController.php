<?php

namespace App\Http\Controllers;
use App\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibroController extends Controller
{

    public function index(){
        $libros = Libro::where('privado',0)->get();

        return response()->json($libros);
    }

    //Obtenemos los libros que el usuario actual ha subido a la plataforma
    public function librosUsuario(){
        $libros = Libro::where('uploader',Auth::id())->get();
        return response()->json($libros);
    }


    public function agregar(Request $request){
        //        Validando si los datos son unicos
        $this->validate($request, [
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);

        //Obtenemos el ID del usuario actualmente loggeado y lo metemos como el atributo de uploader
        $request['uploader'] = $request->user()->id;
        $libro = Libro::create($request->all());

        return response()->json($libro);
    }

    public function editar(Request $request, $id){
        //Creamos una token random
        $libro = Libro::find($id);
        $libro->fill($request->all());
        $libro->save();
        return response()->json($libro);
    }


    public function ver($id){
        $libro = Libro::where('id',$id)->get();

        return response()->json($libro);
    }


    /**
     * TODO Metodo eliminar libro
     */
}
