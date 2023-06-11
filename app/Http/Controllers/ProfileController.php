<?php
namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\SessionGuard; 
use Illuminate\Http\Request;


class ProfileController extends Controller
{

    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->email = $request->input('email');
        $user->save();

        return redirect()->back()->with('status', 'Email mis à jour avec succès');
    }

    public function updateLastname(Request $request)
    {
        $user = Auth::user();
        $user->lastname = $request->input('lastname');
        $user->save();

        return redirect()->back()->with('status', 'Nom mis à jour avec succès');
    }



    public function updatePicturePath(Request $request)
    {
        
        $user = Auth::user();
        $user->picture_path = $request->input('picture_path'); // fait référence à l'attribut name du input dans le form html
        $user->save();

        return redirect()->back()->with('status', 'Photo de profile modifiée avec succès');
    }

    
    public function updateFirstname(Request $request)
    {
        $user = Auth::user();
        $user->firstname = $request->input('firstname');
        $user->save();

        return redirect()->back()->with('status', 'Prénom mis à jour avec succès');
    }

    public function updateUsername(Request $request)
    {
        /* dump($request->input('username'));
        dd($request->input('username')); */

        $user = Auth::user();
        $user->username = $request->input('username');
        $user->save();


        return redirect()->back()->with('status', 'Nom d\'utilisateur mis à jour avec succès');
    }

    public function updatePhonenumber(Request $request)
    {
        /* dump($request->input('username'));
        dd($request->input('username')); */

        $user = Auth::user();
        $user->tel = $request->input('phonenumber');
        $user->save();


        return redirect()->back()->with('status', 'Nom d\'utilisateur mis à jour avec succès');
    }


    public function showProfile($element)    {
        $currentUser = Auth::user();
        
        if($element == 'firstname'){
            return view('profile_details.update_firstname', compact('currentUser'));

        } else if ($element == 'lastname') {
            return view('profile_details.update_lastname', compact('currentUser'));

        } else if ($element == 'email') {
            return view('profile_details.update_email', compact('currentUser'));

        } else if ($element == 'phonenumber') {
            return view('profile_details.update_phonenumber', compact('currentUser'));

        } else if ($element == 'username') {
            return view('profile_details.update_username', compact('currentUser'));

        } else if ($element == 'picture_path') {
            return view('profile_details.update_picture_path', compact('currentUser'));
        
        } else {
            return view('profile', compact('currentUser'));
        }
    }

    public function showUpdateLastname()
    {
        $currentUser = Auth::user();
        return view('update_lastname', compact('currentUser'));
    }
}