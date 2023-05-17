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
        Schema::create('table_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_artikel');
            $table->unsignedBigInteger('id_komentar');
            $table->timestamps();

            $table->foreign('id_artikel')->references('id')->on('table_artikel')->cascadeOnDelete();
            $table->foreign('id_komentar')->references('id')->on('table_komentar')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_detail');
    }
};
