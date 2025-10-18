<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
        
            // Basic info
            $table->string('title'); // product title
        
            // Relations
            $table->foreignId('category_id')
                  ->nullable()
                  ->constrained('categories')
                  ->onDelete('set null');
        
            $table->foreignId('author_id')
                  ->nullable()
                  ->constrained('authors')
                  ->onDelete('set null');
        
            // Pricing & Images
            $table->decimal('price', 10, 2)->default(0); 
            $table->string('cover_image', 191); // main cover image
            $table->json('product_gallery')->nullable(); // multiple images (better as JSON)
        
            // Description
            $table->longText('description')->nullable();
            $table->longText('short_description')->nullable();
        
            // Files (optional book formats)
            $table->string('pdf_file')->nullable();
            $table->string('epub_file')->nullable();
            $table->string('mobi_file')->nullable();
        
            // Metadata
            $table->string('tags', 191)->nullable();
            $table->unsignedInteger('download_count')->default(0);
            $table->unsignedTinyInteger('percentage')->default(0); // discount percentage
            $table->date('date')->nullable();
        
            // Flags
            $table->boolean('home_visible')->default(false);
            $table->boolean('is_trending')->default(false);
            $table->tinyInteger('status')->default(0)->comment('1 = active, 0 = inactive');
            $table->string('created_by',20)->default('admin');
        
            $table->timestamps();
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
