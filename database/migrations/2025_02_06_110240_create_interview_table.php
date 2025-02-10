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
        Schema::create('Interview', function (Blueprint $table) {
            $table->id('interview_id');
            $table->date('schedule_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->text('meeting_link')->nullable();
            $table->text('meeting_id')->nullable();
            $table->text('meeting_code')->nullable();
            $table->string('status');
            //foreign key
            $table->unsignedBigInteger('app_id');
            $table->foreign('app_id')->references('app_id')->on('job_applied')->onDelete('cascade');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interview');
    }
};
