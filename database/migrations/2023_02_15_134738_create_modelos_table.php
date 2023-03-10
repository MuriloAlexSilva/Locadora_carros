<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Modelos', function (Blueprint $table) 
        {
            $table->id();
            $table->unsignedBigInteger('marca_id');
            $table->string('nome',30);
            $table->string('image',100);
            $table->integer('numero_portas');
            $table->integer('lugares');
            $table->boolean('air_bags');
            $table->boolean('abs');
            $table->timestamps();

            $table->foreign('marca_id')->references('id')->on('Marcas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Modelos');
    }
};
