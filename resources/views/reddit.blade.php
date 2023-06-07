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
                    @if($currentUser->isReader()) --}}


                    <!-- fonctionne avec song controller -->
            {{--         <div class="card-body">
                        @foreach ($songs as $song)
                    <div class="card" style="margin: 3%;"> 
                        {{ $song->nb_vote }} : {{ $song->title }} - {{ $song->album->artist->first()->name }}
                        <?php $chosenSong = app('App\Http\Controllers\VoteController')->getNbVotes($song->id); ?>
                        <br />{{ $chosenSong->nb_vote ?? 'Aucun vote' }}
                    
                    </div> 

                            <button type="submit" name="vote" value="up">+1</button>
                    <button type="submit" name="vote" value="down">-1</button>
    
                        @endforeach
                    </div> 
 --}}
 <div class="card-body">
    @foreach ($chosenSongs as $chosenSong)
<div class="card" style="margin: 3%;"> 
    {{ $chosenSong->nb_vote }}
    {{ $chosenSong->song->title }} - {{ $chosenSong->song->album->artist->first()->name}}

</div> 
<form action="{{ route('chosen.vote') }}" method="POST">
    @csrf
    <input type="hidden" name="song_id" value="{{ $chosenSong->song_id }}">
    <button type="submit" name="vote" value="up">+1</button>
    <button type="submit" name="vote" value="down">-1</button>

</form>

    @endforeach
</div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

