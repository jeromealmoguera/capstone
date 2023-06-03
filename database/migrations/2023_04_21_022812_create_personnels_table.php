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
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('birth_date');
            $table->string('birth_place');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->enum('civil_status', ['Single', 'Married', 'Divorced', 'Widowed']);
            $table->string('citizenship');
            $table->enum('blood_type', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']);
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('mobile_no');
            $table->string('tel_no')->nullable();
            $table->text('home_street')->nullable();
            $table->text('home_city')->nullable();
            $table->text('home_province')->nullable();
            $table->text('home_zip')->nullable();
            $table->text('current_street');
            $table->text('current_city');
            $table->text('current_province');
            $table->text('current_zip');
            $table->enum('ranks', ['Patrolman', 'Patrolwoman', 'Police Corporal', 'Police Staff Sergeant', 'Police Master Sergeant', 'Police Senior Master Sergeant', 'Police Chief Master Sergeant', 'Police Executive Master Sergeant', 'Police Lieutenant','Police Captain', 'Police Lieutenant Colonel', 'Police Colonel', 'Police Brigadier General', 'Police Major General', 'Police Lieutenant General', 'Police General']);
            $table->string('unit');
            $table->string('sub_unit');
            $table->string('station');
            $table->string('designation');
            $table->enum('status', ['Active', 'Inactive']);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnels');
    }
};
