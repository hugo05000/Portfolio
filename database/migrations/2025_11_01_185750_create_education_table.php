<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->string('diplome');
            $table->string('ecole')->nullable();
            $table->string('details')->nullable();
            $table->year('annee_debut');
            $table->year('annee_fin');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('educations'); }
};
