<?php

// 2024_12_11_000000_create_users_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number', 15)->nullable();


            $table->text('about')->nullable();

            $table->enum('governorate', ['Amman', 'Zarqa', 'Irbid', 'Aqaba', 'Mafraq', 'Karak', 'Maan', 'Ajloun', 'Balqa', 'Jerash', 'Tafilah', 'Madaba']);
            $table->enum('gender', ['male', 'female']);



            $table->string('password');
            $table->enum('role', ['superadmin', 'admin', 'user'])->default('user');
            $table->string('profile_image')->nullable();
            $table->enum('is_deleted', ['0', '1'])->default('0');  // Added is_deleted column
            $table->timestamps(0);
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
