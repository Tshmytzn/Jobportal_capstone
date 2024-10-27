<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePesoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobseeker_pesoform', function (Blueprint $table) {
            $table->id('peso_id');
            $table->integer('js_id');
            $table->string('peso_srsid');
            $table->string('peso_fullname');
            $table->string('peso_birthdate');
            $table->string('peso_age');
            $table->string('peso_gender');
            $table->string('peso_civilstatus');
            $table->string('peso_city');
            $table->string('peso_baranggay');
            $table->string('peso_street');
            $table->string('peso_email')->unique();
            $table->string('peso_tel')->nullable();
            $table->string('peso_cell');
            $table->string('peso_employment');
            $table->string('peso_educ');
            $table->string('peso_position');
            $table->string('peso_skills');
            $table->string('peso_work');
            $table->string('peso_4ps');
            $table->string('peso_pwd');
            $table->string('peso_registration');
            $table->string('peso_remarks')->nullable();
            $table->string('peso_office');
            $table->string('peso_type');
            $table->string('peso_class');
            $table->string('peso_program');
            $table->string('peso_event');
            $table->string('peso_transaction');

            $table->timestamps();
        });

        DB::table('jobseeker_pesoform')->insert([
            'peso_id' => 1,
            'js_id' => 1,
            'peso_srsid' => '23234534',
            'peso_fullname' => 'NATALIA ANNE BADAJOZ',
            'peso_birthdate' => '2001-10-01',
            'peso_age' => '23yrs and 0months',
            'peso_gender' => 'Female',
            'peso_civilstatus' => 'Married',
            'peso_city' => 'Victorias City',
            'peso_baranggay' => 'Barangay 16',
            'peso_street' => '4th st',
            'peso_email' => 'natalia.badajoz@job.com',
            'peso_tel' => '1236-5783',
            'peso_cell' => '9748567684',
            'peso_employment' => 'Unemployed',
            'peso_educ' => 'High School Graduate',
            'peso_position' => 'Construction',
            'peso_skills' => 'Technical Proficiency, Physical Fitness, Attention...',
            'peso_work' => 'none',
            'peso_4ps' => 'Yes',
            'peso_pwd' => 'Yes',
            'peso_registration' => 'October 27, 2024',
            'peso_remarks' => 'none',
            'peso_office' => 'Victorias',
            'peso_type' => 'Component City',
            'peso_class' => '4th Class',
            'peso_program' => 'PESO',
            'peso_event' => '635 CONG KIKO TUPAD 2024',
            'peso_transaction' => '08 - Placement (as reported by employer)',
            'created_at' => '2024-10-27 01:39:38',
            'updated_at' => '2024-10-27 01:39:38',
        ]);

        DB::table('jobseeker_pesoform')->insert([
            'peso_id' => 2,
            'js_id' => 3,
            'peso_srsid' => '16197152',
            'peso_fullname' => 'ANGIE LOU FORTU FERNANDO',
            'peso_birthdate' => '1988-08-22',
            'peso_age' => '36yrs and 1months',
            'peso_gender' => 'Male',
            'peso_civilstatus' => 'Single',
            'peso_city' => 'Victorias City',
            'peso_baranggay' => 'Barangay 2',
            'peso_street' => 'DE LEON STREET',
            'peso_email' => 'angelou@job.com',
            'peso_tel' => '1236-5783',
            'peso_cell' => '9748567684',
            'peso_employment' => 'Unemployed',
            'peso_educ' => 'High School Graduate',
            'peso_position' => 'STREET AMBULANT VENDOR',
            'peso_skills' => 'Technical Proficiency, Physical Fitness, Attention...',
            'peso_work' => 'none',
            'peso_4ps' => 'No',
            'peso_pwd' => 'No',
            'peso_registration' => 'March 15, 2024',
            'peso_remarks' => 'none',
            'peso_office' => 'Victorias',
            'peso_type' => 'Component City',
            'peso_class' => '4th Class',
            'peso_program' => 'PESO',
            'peso_event' => 'QRD INTERNATIONAL PLACEMENT INC,SPECIAL RECRUITMENT ACTIVITY',
            'peso_transaction' => '12 - Attended SRA',
            'created_at' => '2024-10-27 01:39:38',
            'updated_at' => '2024-10-27 01:39:38',
        ]);

        DB::table('jobseeker_pesoform')->insert([
            'peso_id' => 3,
            'js_id' => 3,
            'peso_srsid' => '16197152',
            'peso_fullname' => 'JOVITO PANGANTIHON GLARAGA',
            'peso_birthdate' => '1992-04-27',
            'peso_age' => '32yrs and 5months',
            'peso_gender' => 'Male',
            'peso_civilstatus' => 'Single',
            'peso_city' => 'Victorias City',
            'peso_baranggay' => 'Barangay 2',
            'peso_street' => 'DE LEON STREET',
            'peso_email' => 'jovito.glaraga@job.com',
            'peso_tel' => '1236-5783',
            'peso_cell' => '9660622877',
            'peso_employment' => 'Unemployed',
            'peso_educ' => 'High School Graduate',
            'peso_position' => 'SITIO CATABLA HDA. AMBULONG',
            'peso_skills' => 'Technical Proficiency, Physical Fitness, Attention...',
            'peso_work' => 'none',
            'peso_4ps' => 'No',
            'peso_pwd' => 'No',
            'peso_registration' => 'October 02, 2018',
            'peso_remarks' => 'none',
            'peso_office' => 'Victorias',
            'peso_type' => 'Component City',
            'peso_class' => '4th Class',
            'peso_program' => 'PESO',
            'peso_event' => 'QRD INTERNATIONAL PLACEMENT INC,SPECIAL RECRUITMENT ACTIVITY',
            'peso_transaction' => '12 - Attended SRA',
            'created_at' => '2024-10-27 01:39:38',
            'updated_at' => '2024-10-27 01:39:38',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobseeker_pesoform');
    }
}
