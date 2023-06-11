@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <h1>Profil</h1>
                    <p>Photo de profil :
                        <img src="{{ asset( $currentUser->picture_path )  }}" alt="Prout">

                        <a href="{{ route('update_picture_path', ['picture_path' => 'picture_path']) }}">
                            <i class="fas fa-edit"></i> Edit
                        </a>


                    </p>
                    <p>Nom : {{ $currentUser->lastname }}
                        <a href="{{ route('update_lastname', ['lastname' => 'lastname']) }}">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    </p>
                    <p>Prénom : {{ $currentUser->firstname }}
                        <a href="{{ route('update_firstname', ['firstname' => 'firstname']) }}">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    </p>
                    <p>Nom d'utilisateur : {{ $currentUser->username }}
                        <a href="{{ route('update_username', ['username' => 'username']) }}">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    </p>
                    <p>Email : {{ $currentUser->email }}
                        <a href="{{ route('update_email', ['email' => 'email']) }}">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    </p>
                    <p>Téléphone : {{ $currentUser->tel }}
                        <a href="{{ route('update_phonenumber', ['phonenumber' => 'phonenumber']) }}">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    </p>
                    <p>Type d'accès : {{ $currentUser->access_type }}</p>


                </div>

            </div>
        </div>
    </div>
</div>
@endsection