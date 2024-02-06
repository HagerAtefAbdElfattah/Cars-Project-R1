<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory, Notifiable;

    protected $fillable =['firstName', 'lastName', 'email', 'content'];
    
}
