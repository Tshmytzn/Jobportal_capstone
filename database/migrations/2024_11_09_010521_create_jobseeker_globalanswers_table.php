<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobseekerGlobalanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobseeker_globalanswers', function (Blueprint $table) {
            $table->id();
            $table->string('js_id');
            $table->string('question_id')->nullable(); 
            $table->string('option_id')->nullable(); 
            $table->text('answer_text')->nullable(); 
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
        Schema::dropIfExists('jobseeker_globalanswers');
    }
};

