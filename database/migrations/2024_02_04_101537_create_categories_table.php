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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 300);
            $table->string('slug', 300)->unique(); // Unique slug for SEO-friendly URLs
            $table->string('title', 300)->nullable(); // Category title
            $table->string('meta_title', 300)->nullable(); // Meta title for SEO
            $table->text('meta_description')->nullable(); // Meta description for SEO
            $table->text('meta_keywords')->nullable(); // Meta keywords for SEO
            $table->tinyInteger('status')->default(0)->comment('0 not delete, 1 delete'); // Status of the category (active/inactive)
            $table->tinyInteger('is_delete')->default(0)->comment('0 not delete, 1 delete'); // Flag to soft delete the category
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
