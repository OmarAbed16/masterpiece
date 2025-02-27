<?php
// 2024_12_11_000001_create_listings_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->enum('status', ['active', 'inactive', 'archived'])->default('active');
            $table->string('location');
            $table->enum('governorate', [
                'Amman', 'Irbid', 'Zarqa', 'Aqaba', 'Jerash', 'Madaba', 'Mafraq', 
                'Ajloun', 'Karak', 'Tafilah', 'Maan', 'Balqa'
            ])->default('Amman');
            $table->foreignId('owner_id')->constrained('users')->onDelete('cascade');
            $table->integer('bed')->nullable()->default(0);  
            $table->integer('bath')->nullable()->default(0);  
            $table->integer('sqft')->nullable()->default(0);  
            $table->enum('is_deleted', ['0', '1'])->default('0'); 
            $table->timestamps(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('listings');
    }
}
