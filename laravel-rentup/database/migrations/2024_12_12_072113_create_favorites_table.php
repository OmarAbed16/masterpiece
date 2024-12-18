<?php

// 2024_12_11_000004_create_favorites_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('listing_id')->constrained('listings')->onDelete('cascade');
            $table->enum('is_deleted', ['0', '1'])->default('0');  // Added is_deleted column
            $table->timestamps(0);
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}
