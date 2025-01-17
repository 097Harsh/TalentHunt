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
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable(); 
            $table->unsignedBigInteger('city_id')->nullable(); 
            $table->text('course')->nullable(); 
            $table->text('skills')->nullable(); 
            
            // Foreign key constraints
            $table->foreign('country_id')->references('country_id')->on('country')->onDelete('set null');
            $table->foreign('state_id')->references('state_id')->on('state')->onDelete('set null');
            $table->foreign('city_id')->references('city_id')->on('city')->onDelete('set null');
            
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
