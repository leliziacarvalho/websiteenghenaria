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
     Schema::create('departamentu', function (Blueprint $table) {
            $table->id();
            $table->enum('naran', ['Informatika', 'Geologia', 'Industria', 'Petroleo']); // enum kolom
            $table->text('deskrisaun')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departamentu');
    }
};
