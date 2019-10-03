<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeroisPoderesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('herois_poderes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('heroi_id');
            $table->integer('poder_id');
            $table->foreign('heroi_id')->references('id')->on('herois');
            $table->foreign('poder_id')->references('id')->on('poderes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('herois_poderes');
    }
}
