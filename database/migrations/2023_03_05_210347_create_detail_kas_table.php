<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailKasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kas', function (Blueprint $table) {
            $table->bigIncrements('id_detail_kas');
            $table->foreignId('kas_id')->references('id_kas')->on('kas');
            $table->string('keterangan');
            $table->bigInteger('kredit')->nullable();
            $table->bigInteger('debet')->nullable();
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
        Schema::dropIfExists('detail_kas');
    }
}
