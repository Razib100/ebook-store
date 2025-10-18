<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'customer_id',
        'name',
        'email',
        'amount',
        'currency',
        'payment_type',
        'payment_method',
        'payment_method_types',
        'payment_id',
        'client_secret',
        'date',
        'status',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'amount' => 'decimal:2',
        'date' => 'datetime',
        'status' => 'boolean',
    ];

    /**
     * Relationship with User (optional)
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}

