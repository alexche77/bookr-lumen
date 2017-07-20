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
        //  $this->middleware('auth:api');
    }

    public function agregar(Request $request){

//        Validando si los datos son unicos
        $this->validate($request, [
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
        ]);

        //Creamos una token random
        $request['api_token'] = str_random(60);
        $request['password'] = app('hash')->make($request['password']);
        $user = User::create($request->all());
        return response()->json($user);

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


//
//   public function authenticate(Request $request)
//   {
//           $this->validate($request, [
//               'email' => 'required',
//       'password' => 'required'
//        ]);
//
//      $user = User::where('email', $request->input('email'))->first();
//     if(Hash::check($request->input('password'), $user->password)){
//          $apikey = base64_encode(str_random(40));
//          User::where('email', $request->input('email'))->update(['api_key' => "$apikey"]);;
//          return response()->json(['status' => 'success','api_key' => $apikey]);
//      }else{
//                  return response()->json(['status' => 'fail'],401);
//      }
//   }
}
?>