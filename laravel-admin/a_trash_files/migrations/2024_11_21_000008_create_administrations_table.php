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
        Schema::create('administrations', function (Blueprint $table) {
            $table->id('action_id');
            $table->unsignedBigInteger('admin_id');
            $table->text('action_description');
            $table->timestamp('action_time')->useCurrent();
            $table->enum('is_deleted', ['0', '1'])->default('0')->comment('0 = not deleted, 1 = deleted');
        
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrations');
    }
};
