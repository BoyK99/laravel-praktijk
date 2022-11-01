@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <table class="table">
                <tr>
                    <th class="col-md-1">Name</th>
                    <th class="col-md-2">Description</th>
                    <th class="col-md-3">Playlist image</th>
                    <th class="col-md-1"></th>
                    <th class="col-md-1"></th>
                    <th class="col-md-1"></th>
                    <th class="col-md-1"></th>
                </tr>
                @foreach($playlists as $playlist)
                    <tr>

                        <td><h3>{{$playlist->name}}</h3></td>
                        <td><h3>{{$playlist->description}}</h3></td>
                        <td><img class="card-img-top"
                                 src="@if(!$playlist->image) storage/placeholder.png  @else {{ asset('storage/image/'.$playlist->image) }}@endif"
                                 alt="{{$playlist->image}}"></td>
                        <td><a href="{{route('playlist.toggle-visibility', $playlist->id)}}"
                               class=" btn @if($playlist->active === 1)
                                   btn-success @else  btn-danger @endif"> @if($playlist->active === 1) Toggle off @else Toggle on @endif</a>
                        </td>
                        <td><a href="{{route('playlist.show', $playlist->id)}}" class="btn btn-warning">Details</a></td>
                        <td><a href="{{route('playlist.edit', $playlist->id)}}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="{{route('playlist.destroy', ['playlist'=> $playlist->id])}}" method="POST">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection


