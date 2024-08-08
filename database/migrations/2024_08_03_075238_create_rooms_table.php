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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lab_id');
            $table->string('code_room');
            $table->string('building_room');
            $table->string('floor_room');
            $table->string('room_number');
            //latitude
            $table->double('latitude');
            //longitude
            $table->double('longitude');
            $table->enum('room_status', ['vacant', 'occupied', 'maintenance']);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('lab_id')->references('id')->on('labs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
