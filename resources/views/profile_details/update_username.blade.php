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
                    <h1>Mettre à jour le nom d'utilisateur</h1>
                    <p>Nom d'utilisateur : {{ $currentUser->username }}</p>
                    <form method="POST" action="{{ route('profile.updateUsername') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="username">Nouveau nom d'utilisateur :</label>
                            <input type="text" name="username" id="username" required>
                            @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection