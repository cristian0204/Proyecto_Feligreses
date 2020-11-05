<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFeligreses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('como_llego', function (Blueprint $table) {
            $table->increments('id');
            $table->string('atraves');
            $table->timestamps();
        });

        Schema::create('feligreses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('identificacion');
            $table->date('fecha_nacimiento');
            $table->string('movil');
            $table->string('fijo');
            $table->string('correo');
            $table->string('profesion');
            $table->string('contacto');
            $table->integer('tipo_documento_id')->unsigned();
            $table->integer('estado_id')->unsigned();
            $table->integer('como_llego_id')->unsigned();
            
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documento');
            $table->foreign('estado_id')->references('id')->on('estado');
            $table->foreign('como_llego_id')->references('id')->on('como_llego');

            $table->timestamps();
        });


     /**    Schema::create('pareja', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->date('fecha_nacimiento');
            $table->string('movil');
            $table->integer('feligreses_id')->unsigned();
            $table->timestamps();

            $table->foreign('feligreses_id')->references('id')->on('feligreses');
        });

          Schema::create('hijo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->date('fecha_nacimiento');
            $table->integer('feligreses_id')->unsigned();
            $table->timestamps();

             $table->foreign('feligreses_id')->references('id')->on('feligreses');
        });
**/

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feligreses');
        Schema::dropIfExists('como_llego');
      /**  Schema::dropIfExists('hijo');
        Schema::dropIfExists('pareja');**/
    }
}
