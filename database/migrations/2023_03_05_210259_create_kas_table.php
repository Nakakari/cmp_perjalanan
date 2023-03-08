<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas', function (Blueprint $table) {
            $table->bigIncrements('id_kas');
            $table->date('tgl_buat')->nullable();
            $table->bigInteger('t_kredit');
            $table->bigInteger('t_debet');
            $table->bigInteger('total');
            $table->bigInteger('sisa_saldo');
            $table->bigInteger('transfer')->nullable();
            $table->foreignId('cabang_id')->references('id_cabang')->on('cabang');
            $table->foreignId('created_by')->references('id')->on('users');
            $table->foreignId('updated_by')->nullable()->references('id')->on('users');
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
        Schema::dropIfExists('kas');
    }
}
