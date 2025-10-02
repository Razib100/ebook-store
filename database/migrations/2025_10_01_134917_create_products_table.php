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

            $table->string('title');                         // product title
            $table->foreignId('category_id')                 // category relation
                  ->nullable()
                  ->constrained('categories')
                  ->onDelete('set null');

            $table->decimal('price', 10, 2)->default(0);     // price
            $table->string('cover_image',191);              // cover image
            $table->longText('description')->nullable();     // product description
            $table->string('product_gallery')->nullable(); 
            // files (optional book formats)
            $table->string('pdf_file')->nullable();
            $table->string('epub_file')->nullable();
            $table->string('mobi_file')->nullable();

            // flags
            $table->boolean('is_trending')->default(false);
            $table->tinyInteger('status')->default(0)->comment('1 => active, 0 => inactive');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
