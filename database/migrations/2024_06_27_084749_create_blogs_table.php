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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->binary('image_file')->nullable();
            $table->longText('description');
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->boolean('is_publish')->default(false)->comment('0: No, 1: Yes');
            $table->boolean('status')->default(false)->comment('0: Inactive, 1: Active');
            $table->boolean('is_delete')->default(false)->comment('0: Not Deleted, 1: Deleted');
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
