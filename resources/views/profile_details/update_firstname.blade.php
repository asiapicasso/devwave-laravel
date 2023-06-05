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
                    <h1>Mettre à jour le prénom</h1>
                    <p>Prénom : {{ $currentUser->firstname }}</p>
                    <form method="POST" action="{{ route('profile.updateFirstname') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="firstname">Nouveau prénom : </label>
                            <input type="text" name="firstname" id="firstname" required>
                            @error('firstname')
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