<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table = 'album';
    protected $fillable = ['title', 'year'];

    public function artist()
    {
        return $this->belongsToMany(Artist::class, 'album_artist', 'album_id', 'artist_id');
    }

    public function song()
    {
        return $this->hasMany(Song::class);
    }
}