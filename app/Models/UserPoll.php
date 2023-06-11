<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPoll extends Model
{
    use HasFactory;

    protected $table = 'user_poll';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'poll_id',
        'user_status',
    ];
}