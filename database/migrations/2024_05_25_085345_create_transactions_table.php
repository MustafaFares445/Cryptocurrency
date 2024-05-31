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
        Schema::disableForeignKeyConstraints();

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('amount');
            $table->date('time');
            $table->foreignId('order_id')->references('id')->on('orders');
            $table->foreignId('user_platform_id')->references('id')->on('user_platform');
            $table->foreignId('block1_id')->references('id')->on('blocks');
            $table->foreignId('block2_id')->references('id')->on('blocks');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
