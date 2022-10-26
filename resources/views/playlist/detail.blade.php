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
                                <img src="/storage/placeholder.png">
                            </div>
                            <div class="col-sm">
                                {{--                                 style="display:inline" --}}
                                <h1> {{$playlists->name}} </h1>
                                <h4> Playlist description: </h4> {{$playlists->description}}
                                <br>
                                <h4 style="display:inline"> Playlist name: </h4> {{$playlists->name}}
                                <br>
                                <h4 style="display:inline"> Playlist name: </h4> {{$playlists->name}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <form action="{{route('playlist.store')}}" method="post">--}}
{{--                        @csrf--}}
{{--                        <div class="card-body">--}}
{{--                            <label for="description" class="form-label">Description:</label>--}}
{{--                            <input id="description"--}}
{{--                                   type="text"--}}
{{--                                   name="description"--}}
{{--                                   class="@error('description') is-invalid @enderror form-control"--}}
{{--                                   value="{{ old('description') }}"--}}
{{--                                   style="vertical-align: top"/>--}}
{{--                            @error('')--}}
{{--                            <span class="">{{ $message }}</span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </form>--}}


{{--                </div>--}}
{{--            </div>--}}
            <div class="card">
{{--                @foreach($comments as $comment)--}}
                    <div class="card-body">
                        <div class="d-flex flex-start align-items-center">
                            <div>
                                <h6 class="fw-bold text-primary mb-1">USER NAME VAN COMMENT</h6>
                                <p class="text-muted small mb-0">
                                    POST DATUM
                                </p>
                            </div>
                        </div>

                        <p class="mt-3 mb-4 pb-2">
{{--                            {{$comment->content}}--}}HIER MESSAGE CONTENT
                        </p>
                    </div>
{{--                @endforeach--}}
                <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
{{--                    <form action="{{route('')}}" method="post">--}}
                        @csrf
                        <div class="d-flex flex-start w-100">
                            <div class="form-outline w-100">
                            <textarea id="description"
                                      type="text"
                                      name="description"
                                      class="@error('description') is-invalid @enderror form-control"
                                      value="{{ old('description') }}"></textarea>
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
            </div>
        </div>
    </div>

@endsection
