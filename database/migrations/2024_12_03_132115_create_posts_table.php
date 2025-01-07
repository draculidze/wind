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
            $table->foreignId('profile_id')->index()->constrained('profiles');
            $table->string('title');
            $table->string('slug')->unique()->index();
            $table->foreignId('category_id')->index()->constrained('categories');
            $table->text('image_path')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->unsignedSmallInteger('status')->default(1);
            $table->boolean('is_published')->default(true);
            $table->text('content')->nullable();
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
