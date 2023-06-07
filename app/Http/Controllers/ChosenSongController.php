<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChosenSong;

class ChosenSongController extends Controller
{

    public function searchForm()
    {
        return view('search.form');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search_term');

        $chosenSongs = ChosenSong::where('title', 'LIKE', '%' . $searchTerm . '%')->get();

        return view('search.results', compact('chosenSongs'));
    }
}