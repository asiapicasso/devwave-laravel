@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reddit') }}</div>



                {{-- @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                @if($currentUser->isReader()) --}}


                <!-- fonctionne avec song controller -->
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @elseif (session('error'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif
                    <select id="songsDropdown">
                        @foreach ($songs as $song)
                        <option value="{{ $song->id }}">
                            {{ $song->title }} - {{ $song->album->artist->first()->name }}
                        </option>
                        @endforeach
                    </select>

                    <form action="{{ route('song.choose') }}" method="POST">
                        @csrf
                        <input id="input_song_id" type="hidden" name="input_song_id" value="{{$song->id}}">
                        <button type="submit" class="btn btn-primary" name="add" value="add">Ajouter</button>
                    </form>
                </div>
                @push('scripts')
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                            console.log('DOM is loaded');
                            var selectElement = document.getElementById('songsDropdown');
                            var hiddenInput = document.getElementById('input_song_id');
                            var currentValue = '';

                            // assigne le premier élément de la liste déroulante
                            var selectedOption = selectElement.options[selectElement.selectedIndex];
                            currentValue = selectedOption.value;
                            hiddenInput.value = currentValue;

                            if (selectElement) {
                                selectElement.addEventListener('change', function () {
                                    var selectedOption = selectElement.options[selectElement.selectedIndex];
                                    currentValue = selectedOption.value;
                                    hiddenInput.value = currentValue;
                                    console.log(currentValue);
                                });
                            }
                        });
                </script>
                @endpush

                <hr>
                <div class="card-body">
                    @foreach ($chosenSongs as $chosenSong)
                    <div class="card" style="margin: 3%;">

                        {{ $chosenSong->song->title }} - {{ $chosenSong->song->album->artist->first()->name}}
                        <br />
                        Nombre de votes : {{ $chosenSong->nb_vote }}
                    </div>
                    <form action="{{ route('chosen.vote') }}" method="POST">
                        @csrf
                        <input type="hidden" name="song_id" value="{{ $chosenSong->song_id }}">
                        <button type="submit" class="btn btn-primary" name="vote" value="up">+1</button>
                        <button type="submit" class="btn btn-primary" name="vote" value="down">-1</button>

                    </form>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection