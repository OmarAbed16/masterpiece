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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->unsignedBigInteger('truck_id')->nullable();
            $table->decimal('quantity', 5, 2);
            $table->timestamp('order_time')->useCurrent();
            $table->timestamp('delivery_time')->nullable();
            $table->text('address');
            $table->enum('status', ['pending', 'shipping', 'delivered', 'canceled']);
          
            $table->timestamps();
            $table->enum('is_deleted', ['0', '1'])->default('0')->comment('0 = not deleted, 1 = deleted');
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('driver_id')->references('driver_id')->on('drivers')->onDelete('set null');
            $table->foreign('truck_id')->references('truck_id')->on('trucks')->onDelete('set null');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
