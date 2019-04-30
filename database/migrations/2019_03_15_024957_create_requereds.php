<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequereds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Requereds', function (Blueprint $table) {
            $table->increments('Rq_idRequeridos')->unsigned()->unique();

            $table->string('Rq_DescrRequeridos', 50);
            $table->timestamps();

            // $table->primary('Rq_idRequeridos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Requereds');
    }
}
