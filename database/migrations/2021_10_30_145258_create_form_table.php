<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string("nama");
            $table->string("nim");
            $table->string('email');
            $table->string("jenis_kelamin");
            $table->string("nomro_hp");
            $table->string('asal_kampus');
            $table->string("program_studi");
            $table->string("alamat");
            $table->string('alasan_magang');
            $table->string("jenis_magang");
            $table->string("wfo");
            $table->string("status_kerja");
            $table->string("bahasa_inggris");
            $table->string("nomor_dosen");
            $table->string('divisi');
            $table->string("jam_kerja");
            $table->string("desain_grafis");
            $table->string("videografer");
            $table->string("programmer");
            $table->string("digital_marketing");  
            $table->string("laptop_magang");
            $table->string("alat_magang");
            $table->time('mulai_magang');
            $table->time('selesai_magang');
            $table->string("asal_info");
            $table->string('cv');
            $table->string("portofolio");
            $table->string("kegiatan_diluar_magang");
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
        Schema::dropIfExists('form');
    }
}
