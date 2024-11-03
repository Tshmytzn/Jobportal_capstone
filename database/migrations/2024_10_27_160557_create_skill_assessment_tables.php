<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSkillAssessmentTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create assessments table
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Create sections table
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assessment_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Create questions table
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained()->onDelete('cascade');
            $table->text('question_text');
            $table->enum('question_type', ['text', 'radio', 'checkbox']);
            $table->text('answer')->nullable();
            $table->timestamps();
        });

        // Create options table
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained()->onDelete('cascade');
            $table->string('option_text');
            $table->timestamps();
        });

        // Insert preloaded data into assessments table
        $assessmentId = DB::table('assessments')->insertGetId([
            'title' => 'General Skill Assessment for Blue-Collar Workers',
            'description' => 'This assessment evaluates basic skills and knowledge required for blue-collar roles.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert preloaded data into sections table
        $sectionId1 = DB::table('sections')->insertGetId([
            'assessment_id' => $assessmentId,
            'title' => 'Basic Literacy and Communication Skills',
            'description' => 'Assesses language skills, grammar, and clarity in communication.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $sectionId2 = DB::table('sections')->insertGetId([
            'assessment_id' => $assessmentId,
            'title' => 'Safety Awareness',
            'description' => 'Evaluates knowledge of basic safety practices in a work environment.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Questions and options for Section 1
        $question1 = DB::table('questions')->insertGetId([
            'section_id' => $sectionId1,
            'question_text' => 'Which of the following is a correct sentence?',
            'question_type' => 'radio',
            'answer' => 'He doesn’t have a wrench.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $question2 = DB::table('questions')->insertGetId([
            'section_id' => $sectionId1,
            'question_text' => 'Choose the correct spelling:',
            'question_type' => 'radio',
            'answer' => 'Maintenance',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $question3 = DB::table('questions')->insertGetId([
            'section_id' => $sectionId1,
            'question_text' => 'What does "PPE" stand for?',
            'question_type' => 'radio',
            'answer' => 'Personal Protective Equipment',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Options for Section 1 questions
        DB::table('options')->insert([
            // Options for question 1
            ['question_id' => $question1, 'option_text' => 'He don’t have a wrench.', 'created_at' => now(), 'updated_at' => now()],
            ['question_id' => $question1, 'option_text' => 'He doesn’t have a wrench.', 'created_at' => now(), 'updated_at' => now()],
            ['question_id' => $question1, 'option_text' => 'He didn’t had a wrench.', 'created_at' => now(), 'updated_at' => now()],
            ['question_id' => $question1, 'option_text' => 'He don’t has a wrench.', 'created_at' => now(), 'updated_at' => now()],

            // Options for question 2
            ['question_id' => $question2, 'option_text' => 'Maintenence', 'created_at' => now(), 'updated_at' => now()],
            ['question_id' => $question2, 'option_text' => 'Maintainance', 'created_at' => now(), 'updated_at' => now()],
            ['question_id' => $question2, 'option_text' => 'Maintenance', 'created_at' => now(), 'updated_at' => now()],
            ['question_id' => $question2, 'option_text' => 'Mantainance', 'created_at' => now(), 'updated_at' => now()],

            // Options for question 3
            ['question_id' => $question3, 'option_text' => 'Personal Protective Equipment', 'created_at' => now(), 'updated_at' => now()],
            ['question_id' => $question3, 'option_text' => 'Protective Personal Equipment', 'created_at' => now(), 'updated_at' => now()],
            ['question_id' => $question3, 'option_text' => 'Personnel Protective Equipment', 'created_at' => now(), 'updated_at' => now()],
            ['question_id' => $question3, 'option_text' => 'People Protective Equipment', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Questions and options for Section 2
        $question4 = DB::table('questions')->insertGetId([
            'section_id' => $sectionId2,
            'question_text' => 'What should you do before using a new piece of equipment?',
            'question_type' => 'radio',
            'answer' => 'Read the safety manual and instructions',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $question5 = DB::table('questions')->insertGetId([
            'section_id' => $sectionId2,
            'question_text' => 'Which item is not considered PPE?',
            'question_type' => 'radio',
            'answer' => 'Casual shoes',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $question6 = DB::table('questions')->insertGetId([
            'section_id' => $sectionId2,
            'question_text' => 'What color are warning signs usually?',
            'question_type' => 'radio',
            'answer' => 'Yellow',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Options for Section 2 questions
        DB::table('options')->insert([
            // Options for question 4
            ['question_id' => $question4, 'option_text' => 'Turn it on and test it', 'created_at' => now(), 'updated_at' => now()],
            ['question_id' => $question4, 'option_text' => 'Read the safety manual and instructions', 'created_at' => now(), 'updated_at' => now()],
            ['question_id' => $question4, 'option_text' => 'Ask a coworker how to use it', 'created_at' => now(), 'updated_at' => now()],
            ['question_id' => $question4, 'option_text' => 'Start using it carefully', 'created_at' => now(), 'updated_at' => now()],

            // Options for question 5
            ['question_id' => $question5, 'option_text' => 'Hard hat', 'created_at' => now(), 'updated_at' => now()],
            ['question_id' => $question5, 'option_text' => 'Safety goggles', 'created_at' => now(), 'updated_at' => now()],
            ['question_id' => $question5, 'option_text' => 'Casual shoes', 'created_at' => now(), 'updated_at' => now()],
            ['question_id' => $question5, 'option_text' => 'Gloves', 'created_at' => now(), 'updated_at' => now()],

            // Options for question 6
            ['question_id' => $question6, 'option_text' => 'Red', 'created_at' => now(), 'updated_at' => now()],
            ['question_id' => $question6, 'option_text' => 'Blue', 'created_at' => now(), 'updated_at' => now()],
            ['question_id' => $question6, 'option_text' => 'Yellow', 'created_at' => now(), 'updated_at' => now()],
            ['question_id' => $question6, 'option_text' => 'Green', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop options table first due to foreign key constraint
        Schema::dropIfExists('options');
        // Drop questions table
        Schema::dropIfExists('questions');
        // Drop sections table
        Schema::dropIfExists('sections');
        // Drop assessments table
        Schema::dropIfExists('assessments');
    }
}
