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
        Schema::create('Carros', function (Blueprint $table) 
        {
            $table->id();
            $table->unsignedBigInteger('modelo_id');
            $table->string('placa',10)->unique();
            $table->boolean('disponivel');
            $table->integer('km');
            $table->timestamps();

            $table->foreign('modelo_id')->references('id')->on('Modelos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Carros');
    }
};
