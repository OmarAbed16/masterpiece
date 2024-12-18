<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->id('truck_id');
            $table->unsignedBigInteger('driver_id');
            $table->string('license_plate', 50)->unique();
            $table->string('company_name');
            $table->decimal('capacity', 5, 2);
            $table->decimal('current_load', 5, 2)->default(0);
            $table->enum('status', ['available', 'in_transit', 'maintenance']);
            $table->date('last_service_date')->nullable();
            $table->timestamps();
            $table->enum('is_deleted', ['0', '1'])->default('0')->comment('0 = not deleted, 1 = deleted');
        
            $table->foreign('driver_id')->references('driver_id')->on('drivers')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trucks');
    }
};
