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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
           $table->unsignedBigInteger('user_detail_id');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('department_id');
            $table->enum('day_of_week', ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']);
            $table->unsignedBigInteger('shift_id');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_detail_id')->references('id')->on('user_details');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('shift_id')->references('id')->on('shifts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
