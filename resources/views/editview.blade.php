@extends('layouts/app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style="margin-top:20px">
                <h2 class="text-center">{{$headTitle}}</h2>
                <form action="{{route('index.update', $playlists->id )}}" method="post">
                    @method('put')

                    @csrf
                    <div class="form-group" style="margin-top:20px">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name"
                               placeholder="Change playlist name"
                               value="{{$playlists->name}}">
                        <span style="color:red">@error('title'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group" style="margin-top:20px">
                        <label for="">Description</label>
                        <input class="form-control form-control-lg" type="text" class="form-control"
                               name="description"
                               placeholder="Change playlist description" value="{{$playlists->description}}">
                        <span style="color:red">@error('description'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group" style="margin-top:20px">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image"
                               placeholder=""
                               accept=".jpg,.jpeg,.png" value="{{$playlists->cover_image}}">
                        <span style="color:red">@error('image'){{ $message }} @enderror</span>
                    </div>

                    @foreach($tags as $tag)
                        <div class="form-check form-switch" style="margin-top: 5px;">
                            <input name="tags[]" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" value="{{$tag->id}}"
                                   @if(old('tags') && in_array($tag->id, old('tags'))) checked="checked"  @endif>
                            <label class="form-check-label" for="flexSwitchCheckDefault">{{$tag->name}}</label>
                        </div>
                    @endforeach
                    <span style="color:red">@error('tags'){{ $message }} @enderror</span>

                    <div class="form-group" style="margin-top:20px">
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                        <a href="{{route('starwars-part.index')}}" class="btn btn-primary btn-block" style="margin-left: 20px">Back</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
