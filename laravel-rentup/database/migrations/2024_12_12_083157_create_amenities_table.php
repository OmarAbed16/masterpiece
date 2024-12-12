<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_amenities_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmenitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amenities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained('listings')->onDelete('cascade'); // Foreign key to listings
            $table->string('amenity_name'); // Name of the amenity (e.g., Wi-Fi, Pool)
            $table->enum('is_deleted', ['0', '1'])->default('0'); // Soft delete flag
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amenities');
    }
}
