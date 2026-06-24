<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mengajars', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('guru_id');
            $table->unsignedBigInteger('mapel_id');

            $table->string('kelas');

            $table->timestamps();

            $table->foreign('guru_id')
                ->references('id')
                ->on('gurus')
                ->onDelete('cascade');

            $table->foreign('mapel_id')
                ->references('id')
                ->on('mapels')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mengajars');
    }
};