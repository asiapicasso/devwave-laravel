@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reddit') }}</div>

                <div class="card-body">

                    {{-- @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if($currentUser->isReader())
                
                    <form method="POST" action="{{ route('song.store') }}">
                        @csrf


                        <div>
                            <label for="question">Nom :</label>
                            <input type="text" name="title" id="title" required>
                        </div>

                        <button type="submit">Add song</button>
                    </form>
                    @endif --}}
                    <div class="card-body">
                        @foreach ($song as $song)
                            <div class="card" style="margin: 3%;">{{ $song->title }} - {{ $song->album->artist->first()->name }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

