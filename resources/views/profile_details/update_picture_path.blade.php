@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Photo de profile') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <h1>Changer la photo de profile</h1>
                    <p>Photo de profile : <img src="{{ asset( $currentUser->picture_path) }}" /> </p>
                    <form method="POST" action="{{ route('profile.updatePicturePath') }}">
                        @csrf
                        {{-- <div class="mb-3">
                            <label for="lastname">Nouvel Photo : </label>
                            <input type="text" name="lastname" id="lastname" required>
                            @error('lastname')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div> --}}

                        <div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">Photo</label>

                            <div class="col-md-6">
                                <div class="photo-selection">
                                    @for($i = 1; $i <= 20; $i++) <label class="photo-item">
                                        <input type="radio" name="picture_path"
                                            value="{{ 'storage/assets/profile_pictures/default/picture_' . $i . '.png' }}" />
                                        <img src="{{ asset('storage/assets/profile_pictures/default/picture_' . $i . '.png') }}"
                                            alt="Image {{ $i }}" />
                                        </label>
                                        @endfor
                                </div>

                                @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection