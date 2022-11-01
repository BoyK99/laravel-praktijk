@extends('layouts.app')

@section('content')
    <div class="container">
        @auth
            <div>
                <a href="{{route('playlist.create')}}">Create playlist</a>
            </div>
        @endauth
        <form action="{{route('playlist.search')}}" method="post">
            @csrf
            <input type="text" name="other">
            <input name="submit" type="submit" value="search" class="btn btn-primary"/>
        </form>
        <div class="m-2">
            @foreach($categories as $category)
                <a href="{{route('playlist.index', ['category' => $category->id])}}"
                   class="btn btn-primary btn-sm">{{$category->name}}</a>
            @endforeach
        </div>
        <div class="row row-cols-md-4 g-3">
            @foreach($playlists as $playlist)
                @if($playlist->active === 1)
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{$playlist->name}}</h4>
                                <img class="card-img-top"
                                     src="@if(!$playlist->image) storage/placeholder.png  @else {{ asset('storage/image/'.$playlist->image) }}@endif"
                                     alt="{{$playlist->image}}">
                                <p class="card-text">{{$playlist->description}}</p>
                                <a href="{{route('playlist.show', $playlist->id)}}" class="btn btn-primary">View
                                    playlist</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            @if($playlists->count() < 1)
                <p>No playlists found.</p>
            @endif
        </div>
    </div>
@endsection
