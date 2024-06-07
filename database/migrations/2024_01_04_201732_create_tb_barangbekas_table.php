<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_barangbekas', function (Blueprint $table) {
            $table->id('id_barang');
            $table->string('image', 255)->nullable();
            $table->string('file', 255)->nullable();
            $table->string('nama_merk', 255)->nullable();
            $table->string('nama_barang', 255)->nullable();
            $table->integer('kuantitas');
            $table->decimal('harga', 15, 1);
            $table->decimal('penawaran', 15, 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_barangbekas');
    }
};
