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
         Schema::create('monografia', function (Blueprint $table) {
        $table->id();
        $table->foreignId('estudante_id')->constrained('estudante')->onDelete('cascade');
        $table->string('titulun');
        $table->string('area_estudu');
        $table->string('palavras_chave');
        $table->text('resumu');
        $table->foreignId('orientador_id')->constrained('orientador')->onDelete('cascade');
        $table->foreignId('co_orientador_id')->nullable()->constrained('orientador')->onDelete('set null');
        $table->enum('estadu', ['halo', 'submete', 'aprovadu', 'rejeita'])->default('halo');
        $table->string('dokumentu_path');
        $table->text('komentariu')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monografia');
    }
};
