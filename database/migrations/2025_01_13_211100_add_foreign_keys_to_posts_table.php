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
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('profile_id')->index()->constrained('profiles'); // FK для нового столбца
            $table->foreign('category_id')
                ->references('id')
                ->on('categories'); // добавление FK к существующему столбцу
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['profile_id', 'category_id']);
        });
    }
};
