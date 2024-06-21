<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['text', 'sender_first_name', 'sender_last_name', 'email', 'doctor_profile_id'];
}
