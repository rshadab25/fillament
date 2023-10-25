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
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('name');
            $table->string('phone');
            $table->timestamps();
        });
         
        // create_patients_table
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->date('date_of_birth');
            $table->string('name');
            $table->foreignId('owner_id')->constrained('owners')->cascadeOnDelete();
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
        Schema::dropIfExists('patients');
    }
};
