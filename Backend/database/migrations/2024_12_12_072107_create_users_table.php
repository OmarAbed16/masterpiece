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
            $table->string('phone_number', 15)->nullable()->default('0787654321');
            $table->string('profile_image')->nullable()->default('http://127.0.0.1:8000/assets/default_images/default_image.png');
            $table->enum('governorate', ['Amman', 'Zarqa', 'Irbid', 'Aqaba', 'Mafraq', 'Karak', 'Maan', 'Ajloun', 'Balqa', 'Jerash', 'Tafilah', 'Madaba']);
            $table->enum('gender', ['male', 'female']);
            $table->text('about')->nullable();

            $table->string('password');
            $table->enum('role', ['superadmin', 'admin', 'user'])->default('user');
            $table->enum('is_deleted', ['0', '1'])->default('0');  
            $table->timestamps(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
