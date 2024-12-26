<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('amenities', function (Blueprint $table) {
            $table->integer('amenity_value'); 
        });
    }
    
    public function down()
    {
        Schema::table('amenities', function (Blueprint $table) {
            $table->dropColumn('amenity_value'); 
        });
    }
    
};
