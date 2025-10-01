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
        'price',
        'cover_image',
        'description',
        'product_gallery',
        'pdf_file',
        'epub_file',
        'mobi_file',
        'is_visible',
        'is_trending',
        'status',
    ];

    /**
     * Casts
     * product_gallery will be stored as JSON
     */
    protected $casts = [
        'product_gallery' => 'array',  // Laravel will auto-cast JSON to array
        'is_visible'      => 'boolean',
        'is_trending'     => 'boolean',
        'status'          => 'integer',
    ];

    /**
     * Relationship: Product belongs to Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
