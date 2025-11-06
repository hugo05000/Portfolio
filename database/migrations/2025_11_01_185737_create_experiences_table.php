<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('entreprise');
            $table->string('titre');
            $table->string('localisation')->nullable();
            $table->date('date_de_debut');
            $table->date('date_de_fin')->nullable();        // null = en cours
            $table->boolean('poste_actuel')->default(false);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('experiences'); }
};
