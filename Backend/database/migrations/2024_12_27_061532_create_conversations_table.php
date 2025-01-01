<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationsTable extends Migration
{
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user1_id'); // First user in the conversation
            $table->unsignedBigInteger('user2_id'); // Second user in the conversation
            $table->timestamps();

            // Foreign keys
            $table->foreign('user1_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user2_id')->references('id')->on('users')->onDelete('cascade');

            // Unique constraint to prevent duplicate conversations
            $table->unique(['user1_id', 'user2_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('conversations');
    }
}
