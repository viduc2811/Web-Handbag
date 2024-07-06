<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as RedirectIfNotClient;
use Illuminate\Notifications\Notifiable;

class Client extends RedirectIfNotClient
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
