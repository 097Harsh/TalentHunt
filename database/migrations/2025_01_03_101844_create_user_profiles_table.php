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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id('p_id');
            $table->text('objective');
            $table->bigInteger('contact');
            $table->string('resume_file');
            $table->string('user_image');
            $table->string('designation');
            $table->text('address');
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->unsignedBigInteger('country_id'); // Foreign key to country table
            $table->unsignedBigInteger('state_id'); // Foreign key to state table
            $table->unsignedBigInteger('city_id'); // Foreign key to city table
            $table->unsignedBigInteger('course_id'); // Foreign key to course table
            $table->unsignedBigInteger('skill_id'); // Foreign key to skills table
            
            // Foreign key constraints
            $table->foreign('country_id')->references('country_id')->on('country')->onDelete('cascade');
            $table->foreign('state_id')->references('state_id')->on('state')->onDelete('cascade');
            $table->foreign('city_id')->references('city_id')->on('city')->onDelete('cascade');
            $table->foreign('course_id')->references('course_id')->on('course')->onDelete('cascade');
            $table->foreign('skill_id')->references('skill_id')->on('skills')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
