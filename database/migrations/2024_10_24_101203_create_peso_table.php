<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peso');
    }
}
