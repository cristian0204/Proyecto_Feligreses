<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_documento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('description',2000);
            $table->timestamps();
        });

        Schema::create('estado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('description',2000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_documento');
        Schema::dropIfExists('estado');
    }
}
