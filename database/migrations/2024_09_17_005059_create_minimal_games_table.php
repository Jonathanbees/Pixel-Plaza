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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->decimal('price', 8, 2);
            $table->text('description');
            $table->decimal('reviewsSum', 8, 2)->default(0);
            $table->integer('reviewsCount')->default(0);
            $table->text('balance')->nullable();
            $table->timestamp('balanceDate')->nullable();
            $table->integer('balanceReviewsCount')->default(0);
            $table->timestamps();
        });

        Schema::create('game_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_category');
        Schema::dropIfExists('games');
    }
};
