@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edit playlist details</h1>
            <div class="card">
                <form action="{{route('playlist.update', $playlists->id )}}" method="post">
                    @method('put')

                    @csrf
                    <div class="card-body">
                        <label for="name" class="form-label">Playlist naam:</label>
                        <input id="name"
                               type="text"
                               name="name"
                               class="@error('name') is-invalid @enderror form-control"
                               value="{{$playlists->name}}"/>
                        @error('')
                        <span class="">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="card-body">
                        <label for="description" class="form-label">Description:</label>
                        <input id="description"
                               type="text"
                               name="description"
                               class="@error('description') is-invalid @enderror form-control"
                               value="{{$playlists->description}}"/>
                        @error('')
                        <span class="">{{ $message }}</span>
                        @enderror
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

                    <div class="card-body">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image"
                               placeholder=""
                               accept=".jpg,.jpeg,.png" value="{{$playlists->cover_image}}">
                        <span style="color:red">@error('image'){{ $message }} @enderror</span>
                    </div>
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
