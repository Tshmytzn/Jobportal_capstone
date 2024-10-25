<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('admin_name');
            $table->string('admin_email')->unique();
            $table->string('admin_mobile');
            $table->text('admin_password');
            $table->string('admin_profile')->nullable();
            $table->timestamps();
        });

        // Insert data after table creation
        DB::table('admins')->insert([
            [
                'admin_name' => 'Gutsy Pasuelo',
                'admin_email' => 'gutsy@admin.com',
                'admin_mobile' => '09987654321',
                'admin_password' => Hash::make('12345678'),
                'admin_profile' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_name' => 'Kailah Leyva',
                'admin_email' => 'kailah@admin.com',
                'admin_mobile' => '09123456789',
                'admin_password' => Hash::make('12345678'),
                'admin_profile' => null,
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
        Schema::dropIfExists('admins');
    }
};
