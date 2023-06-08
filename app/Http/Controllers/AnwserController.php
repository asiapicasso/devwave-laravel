<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anwser;
use Illuminate\Support\Facades\Auth;

class AnwserController extends Controller
{
    //

    protected $fillable = [
        'answer',
        'poll_id',
    ];

    protected $table = 'answer';



    public function vote()
    {
        $uid = Auth::id();



    }
}