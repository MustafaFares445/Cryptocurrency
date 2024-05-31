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

        Schema::create('crypto_wallets', function (Blueprint $table) {
            $table->id();
            $table->string('public_key');
            $table->unsignedBigInteger('balance');
            $table->foreignId('crypto_currency_id')->references('id')->on('crypto_currencies');
            $table->foreignId('wallet_id')->references('id')->on('wallets');

            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crypto_wallets');
    }
};
