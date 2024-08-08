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
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
           $table->unsignedBigInteger('user_detail_id');
            $table->date('date');
            $table->longText('reason');
            $table->binary('proof_document')->nullable(); // Using binary for document storage
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->unsignedBigInteger('reviewed_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_detail_id')->references('id')->on('user_details');
            $table->foreign('reviewed_by')->references('id')->on('user_details');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
};
