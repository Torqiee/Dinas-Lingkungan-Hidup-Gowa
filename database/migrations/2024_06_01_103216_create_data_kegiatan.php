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
        Schema::create('data_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kegiatan_id');
            $table->string('nama_kegiatan');
            $table->string('alamat_kegiatan');
            $table->string('jenis_kegiatan');
            $table->string('kordinat_kegiatan');
            $table->string('besaran_kegiatan');
            $table->boolean('rintek')->default(1);
            $table->boolean('pertek')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kegiatan');
    }
};
