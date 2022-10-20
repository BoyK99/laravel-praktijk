@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
{{--                    {{ __('You are logged in!') }}--}}

                        <a href="{{route('playlist.create')}}">Create playlist</a>
                        </div>

                        <div class="card">
                            <table class="table">
                                <tr>
                                    <th class="col-md-1">Name</th>
                                    <th class="col-md-2">Description</th>
                                    <th class="col-md-3">Playlist image</th>
                                    <th class="col-md-1"></th>
                                    <th class="col-md-1"></th>
                                    <th class="col-md-1"></th>
                                </tr>
                                @foreach($playlists as $playlist)
                                    <tr>
                                        <td>{{$playlist->name}}</td>
                                        <td>{{$playlist->description}}</td>
                                        <td>{{$playlist->cover_image}}</td>
                                        <td><a href="{{route('playlist.show', $playlist->id)}}" class="btn btn-success">Details</a></td>
                                        <td><a href="{{route('playlist.edit', $playlist->id)}}" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            <form action="{{route('playlist.destroy', $playlist->id)}}" method="POST">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">Verwijderen</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
