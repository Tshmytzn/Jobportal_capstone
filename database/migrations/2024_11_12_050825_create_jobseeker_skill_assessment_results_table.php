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
        Schema::create('jobseeker_skill_assessment_results', function (Blueprint $table) {
            $table->id('jsar_id');
            $table->integer('jobseeker_id');
            $table->integer('section_id');
            $table->integer('score');
            $table->integer('total_items');
            $table->integer('percentage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobseeker_skill_assessment_results');
    }
};
