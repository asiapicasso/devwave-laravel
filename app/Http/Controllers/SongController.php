<?php

namespace App\Http\Controllers;

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