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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personnel_id')->constrained()->onDelete('cascade');
            $table->string('file_name');
            $table->enum('document_type', ['Personal Data Sheet', 'Diploma/TOR', 'Physical Fitness Test', 'Trainings', 'Specialized Trainings', 'SALN', 'KSS', 'PER', 'Reassignments', 'Eligibility']);
            $table->date('issued_date');
            $table->string('file_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
