@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Create new playlist</h1>
            <div class="card">
                <form action="{{route('playlist.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <label for="name" class="form-label">Playlist naam:</label>
                        <input id="name"
                               type="text"
                               name="name"
                               class="@error('name') is-invalid @enderror form-control"
                               value="{{ old('name') }}"/>
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
                               value="{{ old('description') }}"/>
                        @error('')
                        <span class="">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="card-body">
                        <label for="category_id" class="form-label">Pick a category:</label>
                        <select id="category_id"
                                name="category_id"
                                class="@error('category_id') is-invalid @enderror form-select">
                            <option @if(old('category_id') == '')selected @endif disabled hidden style='display: none'
                                    value=''></option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" class="dropdown-item">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-body">
                        <input type="submit" name="value" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
