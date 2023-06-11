@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Poll') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if($currentUser->isAdmin())

                    <!-- Fichier create.blade.php -->
                    <form method="POST" action="{{ route('poll.store') }}">
                        @csrf

                        <div>
                            <label for="date">Date :</label>
                            <input type="date" name="date" id="date" required>
                        </div>

                        <div>
                            <label for="theme">Thème :</label>
                            <input type="text" name="theme" id="theme" required>
                        </div>

                        <div>
                            <label for="question">Question :</label>
                            <input type="text" name="question" id="question" required>
                        </div>

                        <button type="submit">Créer le sondage</button>
                    </form>
                    @endif

                    <!-- Fichier index.blade.php -->
                    <h1>Liste des sondages</h1>
                    {{-- a faire dans le controlleur :@if($poll->isClosed()) --}}
                    {{-- titre de la question --}}
                    {{-- @if($polls->isEmpty())
                    <p>Aucun sondage trouvé.</p>
                    @else
                    <ul>
                        @foreach ($polls as $poll)
                        <h2>{{ $poll->question }}</h2>
                        @if (optional($currentUser->polls)->contains('id', $poll->id))
                        <p>Vous avez déjà voté pour ce sondage</p> <br />

                        @else
                        <form method="POST" action="{{ route('poll.vote') }}" class="vote-form">
                            @csrf
                            @foreach ($poll->answers as $answer)
                            <label>
                                <p type="radio" name="answer_id" value="{{ $answer->id }}"
                                    onchange="this.form.submit()">
                                    {{ $answer->title }}: {{ $answer->nb_vote }} votes
                            </label> <br />
                        </form>
                        <button type="submit" style="display: none;">Voter</button>
                        @endforeach

                        @endif
                        @endforeach
                    </ul>
                    @endif --}}



                    @if($polls->isEmpty())
                    <p>Aucun sondage trouvé.</p>
                    @else
                    <ul>
                        @foreach ($polls as $poll)
                        <h2>{{ $poll->question }}</h2>
                        <form method="POST" action="{{ route('poll.vote') }}" class="vote-form">
                            @csrf
                            @foreach ($poll->answers as $answer)
                            <label>
                                <input type="radio" name="answer_id" value="{{ $answer->id }}"
                                    onchange="this.form.submit()">
                                {{ $answer->title }}: {{ $answer->nb_vote }} votes
                            </label> <br />
                            @endforeach

                            {{-- <h2>{{ $poll->question }}</h2>
                            --}}
                            {{-- @foreach ($poll->answers as $answer)
                            <li>
                                <label>
                                    <p type="text" name="answer_id" value="{{ $answer->id }}"
                                        onchange="this.form.submit()">
                                        {{ $answer->title }}: {{ $answer->nb_vote }} votes
                                </label>
                            </li> <br />
                            @endforeach --}}


                            <button type="submit" style="display: none;">Voter</button>
                        </form>
                        @endforeach

                    </ul>
                    @endif

                    <script>
                        function submitVote(radio) {
                            radio.closest('.vote-form').submit();
                        }
                    </script>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection