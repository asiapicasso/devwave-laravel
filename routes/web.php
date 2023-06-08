<?php

use App\Http\Controllers\ChosenSongController;
use App\Models\Answer;
use App\Models\ChosenSong;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use App\Http\Controllers\PollController;
use App\Http\Controllers\SongController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::resource('poll', PollController::class);

Route::resource('song', SongController::class);

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(); // default route pour login et reigster
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// user must be signed in to access the following routes
Route::get('/chat', function () {
    return view('chat');
})->middleware('auth')->name('chat');

/* Route::get('/poll', function () {
    return view('poll');
})->middleware('auth')->name('poll');
 */

/* Route::get('/reddit', [SongController::class, 'index'])->middleware('auth')->name('reddit');
 */
Route::get('/reddit', [ChosenSongController::class, 'index'])->middleware('auth')->name('reddit');


Route::post('/vote', 'VoteController@vote')->name('vote');

Route::get('/search', 'ChosenSongController@searchForm')->name('search.form');
Route::post('/search', 'ChosenSongController@search')->name('search');


Route::get('/{profile}', [ProfileController::class, 'showProfile'])->middleware('auth')->name('profile');
Route::get('/update/{email}', [ProfileController::class, 'showProfile'])->middleware('auth')->name('update_email');
Route::get('/update/{phonenumber}', [ProfileController::class, 'showProfile'])->middleware('auth')->name('update_phonenumber');
Route::get('/update/{profile_picture}', [ProfileController::class, 'showProfile'])->middleware('auth')->name('update_profile_picture');
Route::get('/update/{username}', [ProfileController::class, 'showProfile'])->middleware('auth')->name('update_username');
Route::get('/update/{firstname}', [ProfileController::class, 'showProfile'])->middleware('auth')->name('update_firstname');
Route::get('/update/{lastname}', [ProfileController::class, 'showProfile'])->middleware('auth')->name('update_lastname');
Route::get('/poll', [PollController::class, 'index'])->name('poll.index');

Route::post('/profile/update-email', [ProfileController::class, 'updateEmail'])->name('profile.updateEmail');
Route::post('/profile/update-firstname', [ProfileController::class, 'updateFirstname'])->name('profile.updateFirstname');
Route::post('/profile/update-username', [ProfileController::class, 'updateUsername'])->name('profile.updateUsername');
Route::post('/profile/update-phonenumber', [ProfileController::class, 'updatePhonenumber'])->name('profile.updatePhonenumber');
Route::post('/profile/update-lastname', [ProfileController::class, 'updateLastname'])->name('profile.updateLastname');

Route::post('/chosen/vote', [ChosenSongController::class, 'vote'])->name('chosen.vote');
Route::post('/song/choose', [SongController::class, 'addToChosenSong'])->name('song.choose');

Route::post('/answer/vote', [AnswerCon::class, 'vote'])->name('answer.vote');