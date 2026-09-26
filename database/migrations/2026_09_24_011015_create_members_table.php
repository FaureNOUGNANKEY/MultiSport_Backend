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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('address');
            $table->string('fatherPhone')->nullable();
            $table->string('fatherEmail')->nullable();
            $table->string('motherPhone')->nullable();
            $table->string('motherEmail')->nullable();
            $table->string('athletePhone')->nullable();
            $table->string('athleteEmail')->nullable();
            $table->date('birthday');
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('level')->nullable();
            $table->boolean('novice')->default(false);
            $table->string('previousInstructor')->nullable();
            $table->string('diseases')->nullable();
            $table->string('surgicalHistory')->nullable();
            $table->string('currentTreatment')->nullable();
            $table->string('allergy')->nullable();
            $table->string('others')->nullable();
            $table->enum('type', ['menbre bienfaiteur', 'membre actif', 'membre d\'honeur','parent']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};

