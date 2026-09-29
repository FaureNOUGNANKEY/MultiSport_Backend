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
        Schema::create('bureaus', function (Blueprint $table) {
            $table->id();

            // Relation possible avec Club, League ou Federation
            $table->foreignId('club_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('league_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('federation_id')->nullable()->constrained()->onDelete('cascade');

            // Champs spécifiques au Bureau
            $table->date('startDate');
            $table->date('endDate')->nullable();

            // Rôles du bureau (chaque champ est un membre)
            $table->foreignId('president')->constrained('members')->onDelete('cascade');
            $table->foreignId('secretary')->constrained('members')->onDelete('cascade');
            $table->foreignId('treasurer')->constrained('members')->onDelete('cascade');
            $table->foreignId('vicePresident1')->nullable()->constrained('members')->onDelete('cascade');
            $table->foreignId('vicePresident2')->nullable()->constrained('members')->onDelete('cascade');
            $table->foreignId('deputySecretary')->nullable()->constrained('members')->onDelete('cascade');
            $table->foreignId('deputyTreasurer')->nullable()->constrained('members')->onDelete('cascade');
            $table->foreignId('boardMember1')->nullable()->constrained('members')->onDelete('cascade');
            $table->foreignId('boardMember2')->nullable()->constrained('members')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bureaus');
    }
};
