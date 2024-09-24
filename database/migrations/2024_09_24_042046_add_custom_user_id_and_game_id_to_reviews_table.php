<?php

// Esteban

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
        Schema::table('reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('custom_user_id')->after('id');
            $table->unsignedBigInteger('game_id')->after('custom_user_id');

            $table->foreign('custom_user_id')->references('id')->on('custom_users')->onDelete('cascade');
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['custom_user_id']);
            $table->dropForeign(['game_id']);
            $table->dropColumn(['custom_user_id', 'game_id']);
        });
    }
};
