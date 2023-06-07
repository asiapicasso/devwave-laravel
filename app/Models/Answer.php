<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $table = 'answer';

    // Les colonnes que vous souhaitez rendre accessibles pour l'assignation de masse.
    protected $fillable = ['title', 'nb_vote', 'poll_id'];

    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }
}