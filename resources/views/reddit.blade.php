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

                    <div class="card-body"> 
                        @foreach ($song as $song)
                    <div class="card" style="margin: 3%;"> {{ $song->nb_vote }} : {{ $song->title }} - {{ $song->album->artist->first()->name }}</div> 

                    <button type="submit" name="vote" value="up">+1</button>
        <button type="submit" name="vote" value="down">-1</button>
    
                        @endforeach
                    </div> 

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

