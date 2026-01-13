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
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->string('type_dossier')->nullable();
            $table->date('date');
            $table->decimal('montant',10,2);
            $table->string('statut')->default('En cours');
            $table->text('description')->nullable();
            $table->timestamps();
        });

       Schema::create('co_contactants', function (Blueprint $table) {
              $table->id();
              $table->foreignId('dossier_id')->constrained()->onDelete('cascade');
              $table->string('nom');
              $table->string('role')->nullable();
              $table->string('contact')->nullable();
              $table->timestamps();
         });

        Schema::create('frais', function (Blueprint $table) {
              $table->id();
              $table->foreignId('dossier_id')->constrained()->onDelete('cascade');
              $table->integer('depot')->default(0);
              $table->integer('droits')->default(0);
              $table->integer('honoraires')->default(0);
              $table->integer('total')->default(0);
              $table->timestamps();
         });

        Schema::create('documents', function (Blueprint $table) {
              $table->id();
              $table->foreignId('dossier_id')->constrained()->onDelete('cascade');
              $table->string('type');
              $table->string('fichier');
              $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossiers');
    }
};
