<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Banks', function (Blueprint $table) {
            $table->increments('Bc_idBanco')->primaryKey();

            $table->string('Bc_numBanco', 50)->unique();
            $table->string('Bc_nomeBanco', 50);
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
        Schema::dropIfExists('Banks');
    }
}
