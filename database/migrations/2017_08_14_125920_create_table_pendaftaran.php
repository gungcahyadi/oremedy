<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePendaftaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jk', ['L', 'P'])->default('L');
            $table->string('agama');
            $table->string('alamat_asal');
            $table->string('rt_rw');
            $table->string('no_tlp');
            $table->string('alamat_denpasar');
            $table->string('asal_sekolah');
            $table->string('tahun_kelulusan', 4);
            $table->string('nisn');
            $table->string('jurusan');
            $table->string('alamat_sekolah');
            $table->string('jumlah_nilai_un');
            $table->integer('jumlah_mapel_un');
            $table->string('jumlah_nilai_sttb');
            $table->integer('jumlah_mapel');
            $table->string('nama_ortu');
            $table->string('alamat_ortu');
            $table->string('no_tlp_ortu');
            $table->string('pekerjaan_ortu');
            $table->string('penghasilan_ortu');
            $table->string('info_btc');
            $table->string('file_photo');
            $table->string('status')->default('waiting-confirmation');
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
        Schema::drop('pendaftaran');
    }
}
