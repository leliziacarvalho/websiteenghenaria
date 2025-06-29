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
          Schema::create('estudante', function (Blueprint $table) {
        $table->id();
        $table->string('numeru_estudante')->unique();
        $table->string('nim')->unique();  // Tambahan kolom nim
        $table->string('naran');
        $table->enum('generu', ['mane', 'feto']);
        $table->date('data_moris');
        $table->string('email')->unique();
        $table->string('telefone')->nullable();
        $table->foreignId('departamentu_id')->constrained('departamentu')->onDelete('cascade');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudante');
    }
};
