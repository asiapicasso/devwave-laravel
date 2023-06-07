<?php

namespace App\Http\Controllers;

use App\Models\ChosenSong;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function getNbVotes($id)
    {
        $chosenSong = ChosenSong::where('song_id', $id)->first();

        if ($chosenSong) {
            $nbVote = $chosenSong->nb_vote;
            return response()->json(['nb_vote' => $nbVote]);
        } else {
            return response()->json(['error' => 'Chosen song not found.']);
        }
    }

    public function vote(Request $request)
    {
        $songId = $request->input('song_id');
        $voteType = $request->input('vote');

        $chosenSong = ChosenSong::where('song_id', $songId)->first();

        if ($chosenSong) {
            $nbVotes = $chosenSong->nb_vote;

            if ($voteType === 'up') {
                $nbVotes++;
            } elseif ($voteType === 'down') {
                $nbVotes--;
            }

            $chosenSong->nb_vote = $nbVotes;
            $chosenSong->save();

            return redirect()->back();
        }

        // Traitement si aucun enregistrement ChosenSong n'est trouvé
        // ...

        return redirect()->back();
    }
}