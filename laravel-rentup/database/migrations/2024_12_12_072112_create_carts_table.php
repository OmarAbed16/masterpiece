<?php

// 2024_12_11_000003_create_carts_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('listing_id')->constrained('listings')->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->enum('is_deleted', ['0', '1'])->default('0');  // Added is_deleted column
            $table->timestamps(0);
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
