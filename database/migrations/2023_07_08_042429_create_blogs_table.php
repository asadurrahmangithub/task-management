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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string("blog_title");
            $table->integer("category_id")->nullable();
            $table->longText("elm1");
            $table->string("date");
            $table->string("image");
            $table->string("author");
            $table->tinyInteger('process')->default('0');
            $table->tinyInteger('other')->default('0');
            $table->tinyInteger('publication_status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
