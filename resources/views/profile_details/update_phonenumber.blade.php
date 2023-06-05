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
                    <h1>Update phonenumber</h1>
                    <p>Tél : {{ $currentUser->tel }}</p>
                    <form method="POST" action="{{ route('profile.updatePhonenumber') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="phonenumber">Nouveau tél :</label>
                            <input type="text" name="phonenumber" id="phonenumber" required>
                            @error('phonenumber')
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