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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('image')->nullable(); // Optional category image
            $table->timestamps();
        });

        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Title column
            $table->longText('content'); // HTML content column
            $table->string('thumbnail')->nullable(); // Thumbnail column
            $table->unsignedBigInteger('category_id')->nullable(); // Foreign key for category
            $table->text('tags')->nullable(); // Comma-separated tags
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
        Schema::dropIfExists('categories');
    }
};
