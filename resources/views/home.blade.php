@extends('layouts.app')

@section('content')
    <div class="container">
        @auth
        <div>
            <a href="{{route('playlist.create')}}">Create playlist</a>
        </div>
        @endauth
        <div class="row row-cols-1 row-cols-md-3 g-3">
            @foreach($playlists as $playlist)
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$playlist->name}}</h4>
{{--                            <img class="card-img-top" src="{{$playlist->cover_image}}" alt="{{$playlist->cover_image}}">--}}
                            <img width="100%" height="100%" src="storage/placeholder.png">
                            <p class="card-text">{{$playlist->description}}</p>
                            <a href="{{route('playlist.show', $playlist->id)}}" class="btn btn-primary">View playlist</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    {{ __('You are logged in!') }}--}}
