<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingImagesTable extends Migration
{
    public function up()
    {
        Schema::create('listing_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained('listings')->onDelete('cascade');
            $table->string('image_url');
            $table->enum('is_deleted', ['0', '1'])->default('0');
            $table->enum('is_main', ['0', '1'])->default('0'); // New column for main picture
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('listing_images');
    }
}
