<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->text('about')->nullable();
            $table->string('password');
/*start */
            $table->enum('governorate', ['Amman', 'Zarqa', 'Irbid', 'Aqaba', 'Mafraq', 'Karak', 'Maan', 'Ajloun', 'Balqa', 'Jerash', 'Tafilah', 'Madaba']);
            $table->enum('gender', ['male', 'female']);
            $table->string('profile_image')->nullable();
            $table->enum('role', ['customer', 'driver', 'admin']);
           $table->enum('is_deleted', ['0', '1'])->default('0')->comment('0 = not deleted, 1 = deleted');
/*end */
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
