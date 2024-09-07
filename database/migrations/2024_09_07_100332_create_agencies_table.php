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
            $table->id(); // Primary Key
            $table->string('agency_name');
            $table->string('agency_address');
            $table->string('email_address')->unique(); // Email should be unique
            $table->string('contact_number', 15); // Limited to 15 characters (e.g., "+63" + 10 digits)
            $table->string('landline_number', 15)->nullable(); // Nullable in case it's not provided
            $table->enum('geo_coverage', ['local', 'national', 'international']); // Enum for fixed choices
            $table->string('employee_count'); // Dropdown choice, stored as a string
            $table->string('agency_business_permit')->nullable(); // File path stored
            $table->string('agency_dti_permit')->nullable(); // File path stored
            $table->string('agency_bir_permit')->nullable(); // File path stored
            $table->string('agency_image')->nullable(); 
            $table->string('password'); // Hashed password
            $table->timestamps(); // Created_at and updated_at fields
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
