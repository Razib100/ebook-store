<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'author_id',
        'price',
        'cover_image',
        'product_gallery',
        'description',
        'short_description',
        'pdf_file',
        'epub_file',
        'mobi_file',
        'tags',
        'download_count',
        'percentage',
        'date',
        'home_visible',
        'is_trending',
        'status',
        'created_by'
    ];

    /**
     * Casts
     */
    protected $casts = [
        'product_gallery' => 'array',   // JSON -> Array
        'home_visible'    => 'boolean',
        'is_trending'     => 'boolean',
        'status'          => 'integer',
        'date'            => 'date',
        'tags' => 'array', // automatically casts JSON <-> array
    ];

    /**
     * Relationship: Product belongs to Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relationship: Product belongs to Author
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
