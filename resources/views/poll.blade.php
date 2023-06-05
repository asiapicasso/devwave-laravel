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

                    @if($polls->isEmpty())
                    <p>Aucun sondage trouvé.</p>
                    @else
                    <ul>
                        @foreach($polls as $poll)
                        <li>{{ $poll->theme }} - {{ $poll->question }}</li>
                        @endforeach
                    </ul>
                    @endif



                </div>
            </div>
        </div>
    </div>
</div>
@endsection