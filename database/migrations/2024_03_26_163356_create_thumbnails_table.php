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
        Schema::create('thumbnails', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->string('audio');
            $table->string('video');
            $table->longText('description');
            $table->foreignId('category_id')->nullable();
            $table->foreignId('size_id');
            $table->boolean('deleted')->default(false); // Soft delete
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thumbnails');
    }
};
