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
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->string('id_pengeluaran', 10)->primary();
            $table->string('plat_motor', 10);
            $table->string('id_pegawai', 10);
            $table->date('tgl_pengeluaran');
            $table->string('jenis_pengeluaran', 20);
            $table->string('biaya_pengeluaran', 10);
            $table->timestamps();

            $table->foreign('plat_motor')->references('plat_motor')->on('motors')->onDelete('cascade');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawais')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengeluarans');
    }
};
