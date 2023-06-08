<?php

namespace App\Http\Controllers;

use App\Models\ChosenSong;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Song;
use Illuminate\Support\Facades\Auth;

class SongController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $currentUser = Auth::user();

        $songs = Song::with('album')->get();

        return view('reddit', ['songs' => $songs, 'currentUser' => $currentUser]);

    }


    public function getAllSongs()
    {
        // ici on ajoute la table devant title pour spécifier que c'est bien le champs title de song que l'on veut trier et non celui de la relation contenu dans la table album-> title
        $songs = Song::with('album')->orderBy('song.title', 'asc')->get();

        return $songs;

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
            'title' => 'required',
        ]);

        Song::create($validatedData);

        return redirect()->back()->with('success', 'Chanson ajouté avec succès');
    }


    public function addToChosenSong(Request $request)
    {
        $songId = $request->input('input_song_id');
        $userId = Auth::id();

        // Vérifier si le song_id n'est pas déjà présent dans la table ChosenSong pour cet utilisateur
        $existingChosenSong = ChosenSong::where('song_id', $songId)->first();

        if ($existingChosenSong) {
            return redirect()->back()->with('error', 'La chanson est déjà présente dans la liste des chansons choisies.');
        }

        // Si le song_id n'est pas déjà présent, ajoutez-le à la table ChosenSong
        $chosenSong = new ChosenSong();
        $chosenSong->song_id = $songId;
        $chosenSong->user_id = $userId;
        $chosenSong->date = Carbon::now();
        $chosenSong->nb_vote = 1;
        $chosenSong->save();

        return redirect()->back()->with('success', 'Chanson ajoutée avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

    /* public function getSong(Request $request)
    {
        $songTitle = $request->input('title');
        $song = Song::where('title', $songTitle)->first();
        if ($song) {
            return view('song.show', ['song' => $song]);
        } else {
            return redirect('song')->with('error', 'Song Not Found');
        }
    } */
}