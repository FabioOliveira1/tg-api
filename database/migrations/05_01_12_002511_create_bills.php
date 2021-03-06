<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Bills', function (Blueprint $table) {
            $table->increments('Cta_idConta')->primaryKey();
            $table->integer('Cta_idUser')->unsigned()->default(1);
            $table->integer('Cta_idGrupo')->unsigned();
            $table->integer('Cta_idFornecedor')->unsigned();

            $table->string('Cta_numConta', 50)->nullable();
            $table->string('Cta_descrConta', 300);
            $table->date('Cta_dataEmissao');
            $table->date('Cta_dataVencimento');
            $table->date('Cta_dataPagto')->nullable();
            $table->date('Cta_dataBaixa')->nullable();
            $table->string('Cta_codBarra', 100)->nullable();
            $table->double('Cta_valConta', 12, 2);
            $table->double('Cta_totalConta', 12, 2)->nullable();
            $table->integer('Cta_tempoProtesto')->nullable();
            $table->double('Cta_valProtesto', 12, 2)->nullable();
            $table->double('Cta_Multa', 12, 2)->nullable();
            $table->double('Cta_Juros', 12, 2)->nullable();
            $table->string('Cta_Status', 20)->nullable();
            $table->timestamps();

            $table->foreign('Cta_idUser')->references('User_idUsuario')->on('Users');
            $table->foreign('Cta_idGrupo')->references('GrCt_idGrupo')->on('Bills_group');
            $table->foreign('Cta_idFornecedor')->references('Forn_idFornecedor')->on('Suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Bills');
    }
}
