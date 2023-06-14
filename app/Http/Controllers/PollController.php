<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\Poll;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PollController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentUser = Auth::user();
        $polls = Poll::with('answers')->get();
        // dd($polls);


        return view('poll', ['polls' => $polls, 'currentUser' => $currentUser]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required',
            'theme' => 'required',
            'question' => 'required',
        ]);

        Poll::create($validatedData);

        return redirect()->route('poll.index')->with('success', 'Sondage créé avec succès');
    }

    public function vote(Request $request)
    {
 


        $answerId = $request->input('answer_id');
        $answer = Answer::findOrFail($answerId);

        // Vérifier si l'utilisateur a déjà voté pour le sondage
        $user = Auth::user();
/*         dd($user->polls()); */ 
        if ($user->polls()->where('poll_id', $answer->poll_id)->exists()) {
            // L'utilisateur a déjà voté pour ce sondage

            return redirect()->back()->with('error', 'Vous avez déjà voté pour ce sondage');

            /* return redirect()->route('poll.show'); */
        }

        // Incrémenter le nombre de votes pour la réponse sélectionnée
        $answer->increment('nb_vote');

        // Associer l'utilisateur au sondage
        $user->polls()->attach($answer->poll_id, ['user_status' => 'voted']);

        return redirect()->route('poll.show')->with('success', 'Votre vote a été enregistré avec succès !');

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /*         dd($id);
         */$poll = Poll::findOrFail($id);

        return view('poll.show', ['poll' => $poll]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}