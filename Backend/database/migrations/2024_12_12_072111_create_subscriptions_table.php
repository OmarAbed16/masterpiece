<?php

// 2024_12_11_000006_create_subscriptions_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->enum('is_deleted', ['0', '1'])->default('0');  
            $table->timestamps(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
