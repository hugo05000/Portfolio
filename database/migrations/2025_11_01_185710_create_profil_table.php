<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->string('nom_prenom')->default('Hugo MARCEAU');
            $table->string('ville')->nullable();       // "Gap (Hautes-Alpes)"
            $table->date('date_de_naissance')->nullable();      // 2001-01-15
            $table->string('en_tete')->nullable();     // "Responsable applicatif SI · CPRPF"
            $table->text('resume')->nullable();        // texte de présentation
            $table->string('photo_source')->nullable();   // storage path
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('profiles'); }
};
