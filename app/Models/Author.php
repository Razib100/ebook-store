<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'customer_id',
        'image',
        'gender',
        'short_description',
        'description',
        'dob',
        'phone',
        'home_visible',
        'status',
    ];

    protected $casts = [
        'dob' => 'date',
        'home_visible'    => 'boolean',
        'status' => 'integer',
    ];

    /**
     * Relationship: An author can have many products (books).
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
