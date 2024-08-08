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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
           $table->unsignedBigInteger('user_detail_id');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('schedule_id');
            $table->unsignedBigInteger('shift_id');
            $table->date('date');
            $table->time('time_in')->nullable();
            $table->time('time_out')->nullable();
            //latlon_in
            $table->string('latlon_in');
            //latlon_out
            $table->string('latlon_out')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_detail_id')->references('id')->on('user_details');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->foreign('shift_id')->references('id')->on('shifts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
