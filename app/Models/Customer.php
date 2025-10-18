<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $table = 'customers';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'phone', 'gender', 'date_of_birth', 'status', 'image',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
