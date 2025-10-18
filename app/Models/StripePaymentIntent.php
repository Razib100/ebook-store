<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StripePaymentIntent extends Model
{
    use HasFactory;

    protected $table = 'stripe_payment_intents';

    protected $fillable = [
        'user_id',
        'payment_intent_id',
        'amount',
        'currency',
        'status',
        'receipt_email',
        'metadata',
        'raw_response',
    ];

    protected $casts = [
        'metadata' => 'array',
        'raw_response' => 'array',
        'amount' => 'decimal:2',
    ];

    // Relation to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
