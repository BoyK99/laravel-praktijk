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

                        <div>
                            @foreach($playlists as $playlist)
                                <tr>
                                    <td>{{$playlist->name}}</td>
                                    <td>{{$playlist->description}}</td>
{{--                                    <td class="col-sm-3"> <img class="img-fluid" src="{{$playlist->image}}"></td>--}}
                                </tr>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
