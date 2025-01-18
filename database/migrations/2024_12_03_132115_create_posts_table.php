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
            $table->string('title');
            $table->string('slug')->unique()->index();
            $table->unsignedBigInteger('category_id');
            $table->text('image_path')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->unsignedSmallInteger('status')->default(1);
            $table->boolean('is_published')->default(true);
            $table->text('content')->nullable();
            $table->timestamps();

            $table->softDeletes();
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
