@extends('layouts.app')

@section('content')
    <div>
        <label for="playlist_name" class="form-label"></label>
        <input id="playlist_name">
               type="text"
               name="playlist_name"
               class="@error('playlist_name') is-invalid @enderror form-control"
               value="{{ old('playlist_name') }}" />
         @error('playlist_name')
         <span class="">{{ $message }}</span>
    </div>


@endsection
