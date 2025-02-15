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
        Schema::create('job_applied', function (Blueprint $table) {
            $table->id('app_id');
            $table->text('msg');
            $table->string('resume');
            $table->string('experince');
            $table->string('application_status');
            $table->date('application_date');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id')->references('job_id')->on('job_upload')->onDelete('cascade');;
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applied');
    }
};
