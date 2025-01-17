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
        Schema::create('job_upload', function (Blueprint $table) {
            $table->id('job_id');
            $table->string('title');
            $table->text('description');
            $table->bigInteger('num_of_vacany');
            $table->string('experience');
            $table->string('job_skill_required');
            $table->string('status');
            $table->boolean('j_active');
            $table->bigInteger('job_working_hour');
            $table->date('posted_date');
            $table->date('closing_date');
            $table->string('ContactEmail');
            //all foreign key
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('department_id'); 
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable(); 
            $table->unsignedBigInteger('city_id')->nullable();
            // Foreign key constraints
            $table->foreign('company_id')->references('id')->on('users');
            $table->foreign('category_id')->references('category_id')->on('job_category');
            $table->foreign('department_id')->references('department_id')->on('job_department');
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
        Schema::dropIfExists('job_upload');
    }
};
