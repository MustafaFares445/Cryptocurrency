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

        Schema::create('user_platform_wallet', function (Blueprint $table) {
            $table->id();
            $table->foreignId('crypto_wallet_id')->references('id')->on('crypto_wallets');
            $table->foreignId('user_platform_id')->references('id')->on('user_platform');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
