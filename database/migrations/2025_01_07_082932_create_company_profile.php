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
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id('c_id');
            $table->text('description');
            $table->bigInteger('registration_number')->nullable();
            $table->string('industry_type');
            $table->bigInteger('contact');
            $table->text('address');
            $table->text('website_url');
            $table->date('established_date')->nullable();
            $table->bigInteger('num_of_emp')->nullable();
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable(); 
            $table->unsignedBigInteger('city_id')->nullable();
            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('company_profile');
    }
};
