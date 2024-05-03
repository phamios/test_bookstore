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
        Schema::create('authors_books', function (Blueprint $table) {
            // Define columns for the pivot table
            $table->unsignedBigInteger('authors_id');
            $table->unsignedBigInteger('books_id');

            // Define foreign key constraints
            $table->foreign('authors_id')->references('id')->on('authors')->onDelete('cascade');
            $table->foreign('books_id')->references('id')->on('books')->onDelete('cascade');

            // Define indexes on foreign key columns for performance optimization
            $table->index('authors_id');
            $table->index('books_id');

        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors_books');
    }
};
