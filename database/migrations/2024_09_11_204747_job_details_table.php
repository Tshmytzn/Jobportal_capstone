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
        //
        Schema::create('job_details', function (Blueprint $table) {
            $table->id();
            $table->string('job_title')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('agency_id')->nullable();
            $table->string('job_image')->nullable();
            $table->string('job_location')->nullable();
            $table->string(column: 'job_type')->nullable();
            $table->longText(column: 'job_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
