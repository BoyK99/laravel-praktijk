@extends('layouts.app')

@section('content')
    <div>
        <a href="{{route('playlist.create')}}">Create playlist</a>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @foreach($playlists as $playlist)
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{$playlist->cover_image}}" alt="{{$playlist->cover_image}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$playlist->name}}</h5>
                            <p class="card-text">{{$playlist->description}}</p>
                            <a href="{{route('playlist.show', $playlist->id)}}" class="btn btn-primary">View playlist</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    {{ __('You are logged in!') }}--}}
