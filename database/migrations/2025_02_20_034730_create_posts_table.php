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
            $table->string("title",50);
            $table->text("post_content");
            $table->string('slug',100)->unique();
            $table->string("post_image")->nullable();
            $table->enum("status",["actif","brouillon","archived"]);
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("creator_id");
            $table->foreign("category_id")->references('id')->on('category');
            $table->foreign("creator_id")->references("id")->on("users");
            $table->softDeletes();
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
