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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('author')->index();
            $table->string('title')->unique();
            $table->string('category');
            $table->text('tag');
            $table->text('image_path')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->unsignedInteger('likes')->nullable();
            $table->unsignedInteger('views')->nullable();
            $table->unsignedSmallInteger('status')->default(1);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
