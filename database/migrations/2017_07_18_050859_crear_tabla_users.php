<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('username')->unique();
            $table->string('password');            
            $table->string('email')->unique();
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();;
            $table->integer('edad')->nullable();            
            $table->timestamp('fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('ultima_actualizacion')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->string('api_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
