<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa');
            $table->string('mapel');

            $table->integer('tugas');
            $table->integer('uts');
            $table->integer('uas');

            $table->float('nilai_akhir')->nullable(); // 🔥 otomatis
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};