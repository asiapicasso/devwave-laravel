<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Song;

class ChosenSong extends Model
{
    use HasFactory;

    protected $table = 'chosen_song';
    public $timestamps = false; // pour ignorer les timestamps
    protected $fillable = ['nb_vote', 'date', 'song_id'];

    public function song()
    {
        return $this->belongsTo(Song::class);
    }
}