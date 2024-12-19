<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderIdAndReasonToReviewsTable extends Migration
{
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Add the order_id foreign key
            $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade');

            // Add the reason column
            $table->string('reason')->nullable(); // varchar equivalent
        });
    }

    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Drop the columns if rolling back
            $table->dropColumn('order_id');
            $table->dropColumn('reason');
        });
    }
}
