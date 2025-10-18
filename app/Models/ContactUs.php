<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $table = 'contact_us';

    protected $fillable = [
        'title',
        'first_name',
        'email',
        'choose_sub',
        'message',
        'file_des',
        'checkbox',
        'submit',
        'status',
        'date',
    ];

    protected $casts = [
        'status' => 'boolean', // Convert status to boolean (1 => true, 0 => false)
        'date' => 'date', // Ensure date is treated as a date type
    ];
}
