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
            $table->string('status');
            $table->timestamps();
        });

        // Insert sample data into the 'agencies' table
        DB::table('agencies')->insert([
            [
                'agency_name' => 'Workforce Pro Staffing',
                'agency_address' => '500 fake st',
                'email_address' => 'wpf@job.com',
                'contact_number' => '9784365734',
                'landline_number' => '02-37437473',
                'geo_coverage' => 'local',
                'employee_count' => '1-10',
                'agency_business_permit' => 'PGCWcAC9S3X5dMwxbgGjz03hSkN0rP.png',
                'agency_dti_permit' => '9kQsSkiKFSXJEx82HGJu5G6PsFEmwy.png',
                'agency_bir_permit' => 'bU7FlrF9CYgpefQnm7ixliqiV71Fod.png',
                'agency_image' => null,
                'password' => Hash::make('12345678'),
                'status' => 'Rejected',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'agency_name' => 'Elite Recruitment',
                'agency_address' => '123 main st',
                'email_address' => 'elite@recruit.com',
                'contact_number' => '9876543210',
                'landline_number' => '02-12345678',
                'geo_coverage' => 'national',
                'employee_count' => '11-50',
                'agency_business_permit' => '7hsXJd3aAkJfLsnEpW9tj4MwF1Xp2o.png',
                'agency_dti_permit' => 'Aj5hfLgTfXJkplEh4Ft3sDFy7A8Gp.png',
                'agency_bir_permit' => 'QZ8hfXJfplT4rFgXt2Gh6hfFJsDhRf.png',
                'agency_image' => null,
                'password' => Hash::make('password123'),
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'agency_name' => 'Quick Hire Solutions',
                'agency_address' => '456 jobs ave',
                'email_address' => 'quickhire@solutions.com',
                'contact_number' => '09123456789',
                'landline_number' => null,
                'geo_coverage' => 'international',
                'employee_count' => '51-100',
                'agency_business_permit' => 'Eh7fhJ8sAKTflY7PmgQsAp6hfX0s4A.png',
                'agency_dti_permit' => 'Dj6flRhWtOpAsT7h5GfL6fgFpJf5xT.png',
                'agency_bir_permit' => 'Rh4j8gDfTsAkTfl8Xs2P4mGpFJhRtD.png',
                'agency_image' => null,
                'password' => Hash::make('qwerty123'),
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agencies');
    }
};
