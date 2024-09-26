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
        Schema::create('agencies', function (Blueprint $table) {
            $table->id(); 
            $table->string('agency_name');
            $table->string('agency_address');
            $table->string('email_address')->unique(); 
            $table->string('contact_number', 15); 
            $table->string('landline_number', 15)->nullable(); 
            $table->enum('geo_coverage', ['local', 'national', 'international']); 
            $table->string('employee_count'); 
            $table->string('agency_business_permit')->nullable(); 
            $table->string('agency_dti_permit')->nullable(); 
            $table->string('agency_bir_permit')->nullable(); 
            $table->string('agency_image')->nullable(); 
            $table->string('password'); 
            $table->enum('status', ['pending', 'approved', 'rejected', 'suspended'])->default('pending'); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agencies');
    }
};
