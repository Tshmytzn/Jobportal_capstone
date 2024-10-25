<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobseeker_skills', function (Blueprint $table) {
            $table->id('skill_id'); 
            $table->string('skill_name'); 
            $table->text('skill_desc'); 
            $table->timestamps(); 
        });

                DB::table('jobseeker_skills')->insert([
                    ['skill_name' => 'Technical Proficiency', 'skill_desc' => 'Ability to handle tools, equipment, and machinery'],
                    ['skill_name' => 'Physical Fitness', 'skill_desc' => 'Strength and stamina for hands-on tasks'],
                    ['skill_name' => 'Attention to Detail', 'skill_desc' => 'Careful approach to avoid errors and ensure quality'],
                    ['skill_name' => 'Safety Awareness', 'skill_desc' => 'Knowledge of safety practices and use of protective gear'],
                    ['skill_name' => 'Problem-Solving', 'skill_desc' => 'Ability to troubleshoot and find solutions quickly'],
                    ['skill_name' => 'Communication', 'skill_desc' => 'Clear communication with supervisors and teammates'],
                    ['skill_name' => 'Time Management', 'skill_desc' => 'Efficient work habits and ability to meet deadlines'],
                    ['skill_name' => 'Teamwork', 'skill_desc' => 'Cooperative attitude and ability to work with others'],
                    ['skill_name' => 'Customer Service', 'skill_desc' => 'Professional and respectful interactions with clients'],
                    ['skill_name' => 'Basic Math', 'skill_desc' => 'Ability to measure and calculate as needed for tasks'],
                ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobseeker_skills');
    }
}
