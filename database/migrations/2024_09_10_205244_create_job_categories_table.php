<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        DB::table('job_categories')->insert([
            [
                'name' => 'Skilled Trades',
                'description' => 'Skilled trades involve specialized skills and training for hands-on work in fields like carpentry, plumbing, and electrical work.',
                'image' => 'default.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Construction',
                'description' => 'The construction category encompasses workers involved in building and infrastructure projects.',
                'image' => 'default.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Manufacturing',
                'description' => 'Manufacturing workers produce goods on a large scale using machinery and manual labor.',
                'image' => 'default.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Transportation and Logistics',
                'description' => 'This category includes workers responsible for the transportation, distribution, and logistics of goods and materials.',
                'image' => 'default.png',
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
        Schema::dropIfExists('job_categories');
    }
};
