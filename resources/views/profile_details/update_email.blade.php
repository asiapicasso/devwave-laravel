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
                    <h1>Mettre à jour l'email</h1>
                    <p>Email : {{ $currentUser->email }}</p>
                    <form method="POST" action="{{ route('profile.updateEmail') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email">Nouvel email : </label>
                            <input type="email" name="email" id="email" required>
                            @error('email')
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