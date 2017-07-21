<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Vaciamos la tabla
         DB::table('users')->delete();
         //Insertamos los datos
         DB::table('users')->insert(array(
             array('username'=>'alexche77','password'=>Crypt::encrypt('alexche77'),'email'=>'alexche7717@gmail.com','nombre'=>'Alvaro','apellido'=>'Chévez','edad'=>'22','api_token'=>str_random(60)),             
          ));
    }
}
