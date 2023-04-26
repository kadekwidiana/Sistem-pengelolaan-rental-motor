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
        Schema::create('penyewas', function (Blueprint $table) {
            $table->string('no_paspor', 15)->primary();
            $table->string('nama_penyewa', 100);
            $table->string('email', 100);
            $table->string('asal_negara', 50);
            $table->string('jenis_kelamin', 10);
            $table->string('domisili', 100);
            $table->string('no_telepon', 15);
            $table->string('no_sim', 20);
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
        Schema::dropIfExists('penyewas');
    }
};
