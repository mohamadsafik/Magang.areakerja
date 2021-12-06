<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->date("tgl");
            $table->time('jammasuk')->nullable();
            $table->time('jamkeluar')->nullable();
            $table->time('jammasuk_kembali')->nullable();
            $table->time('jampulang')->nullable();
            $table->time('jamkerja')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('presensi');
    }
}