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
        Schema::create('jobseeker_assessment_result', function (Blueprint $table) {
            $table->id();
            $table->string('jobseeker_id');
            $table->string('assessment_id');
            $table->integer('score')->nullable();
            $table->string('passed')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobseeker_assessment_result');
    }
};
