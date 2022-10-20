@extends('layouts/app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style="margin-top:20px">
                <form action="{{route('playlist.update', $playlists->id )}}" method="post">
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

                    <div class="card-body">
                        <label for="category_id" class="form-label">Pick a category:</label>
                        <select id="category_id"
                                name="category_id"
                                class="@error('category_id') is-invalid @enderror form-select">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" class="dropdown-item">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" style="margin-top:20px">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image"
                               placeholder=""
                               accept=".jpg,.jpeg,.png" value="{{$playlists->cover_image}}">
                        <span style="color:red">@error('image'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group" style="margin-top:20px">
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
