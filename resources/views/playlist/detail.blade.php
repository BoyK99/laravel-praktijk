@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                {{--                            <img src="{{asset('storage/app/public/images/'.playlists->cover_image)}}">--}}
                                {{--                            <img src="{{asset('/storage/app/public/image/placeholder.png')}}">--}}
                                <img class="card-img-top"
                                     src="@if(!$playlists->image) /storage/placeholder.png  @else {{ asset('storage/image/'.$playlists->image) }}@endif"
                                     alt="{{$playlists->image}}">
                            </div>
                            <div class="col-sm">
                                <h1> {{$playlists->name}} </h1>
                                <h4>Playlist description: </h4> {{$playlists->description}}
                                <br>
                                <h4>Gebruiker: </h4> {{$playlists->user->name}}
                                <br>
                                <h4>Category: </h4> {{$playlists->category->name}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="card">
                @foreach($comments as $comment)
                    <div class="card-body">
                        <div class="d-flex flex-start align-items-center">
                            <div>
                                <h6 class="fw-bold text-primary mb-1">{{$comment->user->name}}</h6>
                                <p class="text-muted small mb-0">
                                    Posted at: {{$comment->created_at}}
                                </p>
                                @auth
                                    @if(auth()->user()->id == $comment->user_id || auth()->user()->is_admin)
                                        <form
                                            action="{{route('comments.destroy', ['playlist'=> $playlists->id, 'comment'=> $comment->id])}}"
                                            method="POST">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                        </form>
                                    @endif
                                @endauth
                            </div>

                        </div>

                        <p class="mt-3 mb-4 pb-2">
                            {{$comment->content}}
                        </p>
                    </div>
                @endforeach

                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#"
                                                                                                     class="close"
                                                                                                     data-dismiss="alert"
                                                                                                     aria-label="close">&times;</a>
                            </p>
                        @endif
                    @endforeach
                </div> <!-- end .flash-message -->

                @if($comments->count() < 1)
                    <p>No comments on playlist found.</p>
                @endif

                @if((auth()->check()))
                    <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                        <h4>Comment:</h4>
                        <form action="/playlist/{{$playlists->id}}/comments" method="post">
                            @csrf
                            <div class="d-flex flex-start w-100">
                                <div class="form-outline w-100">
                            <textarea id="content"
                                      type="text"
                                      name="content"
                                      class="@error('content') is-invalid @enderror form-control"
                                      value="{{ old('content') }}"></textarea>
                                </div>
                            </div>
                            @error('')
                            <span class="">{{ $message }}</span>
                            @enderror
                            <div class="float-end mt-2 pt-1">
                                <input type="submit" name="value" value="Post" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
