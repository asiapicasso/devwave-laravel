<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;
    protected $table = 'poll';
    public $timestamps = false;



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'theme',
        'question',
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}