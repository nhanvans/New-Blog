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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('title');
            $table->string('transliterated');
            $table->longText('contents');
            $table->text('contents_short');
            $table->text('image_title')->nullable();
            $table->text('images')->nullable();
            $table->string('slug')->unique();
            $table->dateTime('published_at')->nullable();
            $table->boolean('is_published')->default(false);
            $table->boolean('is_draft')->default(false);
            $table->boolean('is_trending')->default(false);
            $table->boolean('is-featured')->default(false);
            $table->dateTime('trend_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // $table->dropForeign('posts_user_id_foreign');
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('posts');
    }
};
