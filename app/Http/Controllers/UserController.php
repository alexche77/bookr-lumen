<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;
use App\User;

class UserController extends Controller{

    public function __construct()
    {
    }

    public function agregar(Request $request){

//        Validando si los datos son unicos
        $this->validate($request, [
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
        ]);

        $request['password'] = app('hash')->make($request['password']);
        $user = User::create($request->all());
         if ($user) {
            $res['success'] = true;
            $res['message'] = 'Success register!';
            return response($res);
        }
        else{
            $res['success'] = false;
            $res['message'] = 'Failed to register!';
            return response($res);
        }

    }

    public function editar(Request $request, $id){
        //Creamos una token random
        $user = User::find($id);
//        $user->apellido = $request['apellido'];
//        $user->edad = $request['edad'];
//        $user->nombre = $request['nombre'];
        $user->fill($request->all());
        $user->save();
        return response()->json($user);
    }


    //Retorna la info del usuario actualmente loggeado
    public function index(){
        return response()->json(User::find(Auth::id()));
    }

}
?>