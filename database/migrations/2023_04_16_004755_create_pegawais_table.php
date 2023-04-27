<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->string('id_pegawai', 15)->primary();
            $table->string('nama_pegawai', 100);
            $table->string('email', 100);
            $table->string('username', 100);
            $table->string('password', 60);
            $table->string('alamat', 255);
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin', 10);
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
        Schema::dropIfExists('pegawais');
    }
};
