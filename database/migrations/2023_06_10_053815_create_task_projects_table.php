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
        Schema::create('task_projects', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('task_name');
            $table->text('task_description');
            $table->string('date');
            $table->string('start_time');
            $table->string('end_time');
            $table->tinyInteger('process')->default('0');
            $table->tinyInteger('publication_status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_projects');
    }
};
