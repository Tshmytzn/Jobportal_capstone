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
        Schema::create('jobseeker_application', function (Blueprint $table) {
            $table->id();
            $table->integer('js_id');
            $table->integer('peso_form_id')->nullable();
            $table->integer('skill_results_id')->nullable();
            $table->string('applicant_name', 100);
            $table->string('applicant_email', 100);
            $table->string('applicant_phone', 15);
            $table->longtext('cover_letter');
            $table->string('resume_file', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobseeker_application');
    }
};
