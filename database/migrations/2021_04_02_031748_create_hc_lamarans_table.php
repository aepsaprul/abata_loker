<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHcLamaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hc_lamarans', function (Blueprint $table) {
            $table->id();
            $table->integer('master_jabatan_id')->nullable();
            $table->string('nama_lengkap', 50)->nullable();
            $table->string('telepon', 15)->nullable();
            $table->string('email', 100)->nullable();
            $table->text('surat_lamaran')->nullable();
            $table->text('curriculum_vitae')->nullable();
            $table->text('ijazah')->nullable();
            $table->text('transkip_nilai')->nullable();
            $table->text('foto')->nullable();
            $table->text('kartu_keluarga')->nullable();
            $table->text('ktp')->nullable();
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
        Schema::dropIfExists('hc_lamarans');
    }
}
