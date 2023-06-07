<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $table = 'song';
    public $timestamps = false; // pour ignorer les timestamps
    protected $fillable = ['title'/* , 'year', 'duration', 'album_id' */];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}