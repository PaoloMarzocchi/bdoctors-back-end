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
        Schema::create('doctor_profile_specialization', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('doctor_profile_id');
            $table->foreign('doctor_profile_id')->references('id')->on('doctor_profiles')->cascadeOnDelete();

            $table->unsignedBigInteger('specialization_id');
            $table->foreign('specialization_id')->references('id')->on('specializations')->cascadeOnDelete();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_profile_specialization');
    }
};
