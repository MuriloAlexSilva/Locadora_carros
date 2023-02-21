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
        Schema::create('Locacoes', function (Blueprint $table) 
        {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('carro_id');
            $table->datetime('data_inicio_periodo');
            $table->datetime('data_final_previsto_periodo');
            $table->datetime('data_final_realizado_periodo');
            $table->float('valor_diaria', 8,2);
            $table->integer('km_inicial');
            $table->integer('km_final');
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('Clientes');
            $table->foreign('carro_id')->references('id')->on('Carros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Locacoes');
    }
};
