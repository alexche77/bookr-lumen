<?php

use Illuminate\Database\Seeder;

class LibrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Vaciamos la tabla
         DB::table('libros')->delete();
         //Insertamos los datos
         DB::table('libros')->insert(array(
             array('titulo'=>'Libro 1','descripcion'=>'LoremIpsum bla bla','likes'=>3,'uploader'=>1),             
             array('titulo'=>'Libro 2','descripcion'=>'LoremIpsum bla bla','likes'=>2,'uploader'=>1),   
             array('titulo'=>'Libro 3','descripcion'=>'LoremIpsum bla bla','likes'=>1,'uploader'=>1),   
          ));
    }
}
