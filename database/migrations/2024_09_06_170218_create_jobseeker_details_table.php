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
        Schema::create('jobseeker_details', function (Blueprint $table) {
            $table->bigIncrements('js_id'); // Auto-incrementing primary key
            
            // Personal details columns
            $table->string('js_firstname', 50);
            $table->string('js_middlename', 30)->nullable(); // Middlename is optional
            $table->string('js_lastname', 30);
            $table->string('js_suffix', 10)->nullable(); // Suffix is optional
            $table->string('js_gender', 12);
            $table->string('js_address', 255); // Address with maximum length
            $table->string('js_email', 100)->unique(); // Email with unique constraint
            $table->string('js_resume', 100)->nullable(); 
            $table->string('js_contactnumber', 15); // Contact number with length constraint
            $table->string('js_password', 255); // Password (hashed)

            // Timestamps
            $table->timestamps(); // Automatically adds created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobseeker_details');
    }
};
