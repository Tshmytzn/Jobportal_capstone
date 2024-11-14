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
        Schema::create('user_feedbacks', function (Blueprint $table) {
            $table->id();
            $table->string('application_id'); 
            $table->string('user_id'); 
            $table->enum('feedback_type', ['jobseeker', 'agency']); 
            $table->integer('rating')->check('rating >= 1 AND rating <= 5'); 
            $table->text('comments')->nullable(); 
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_feedbacks');
    }
};
