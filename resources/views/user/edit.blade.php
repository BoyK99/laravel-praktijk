@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h4>Edit Profile</h4>
                    <div class="card-body">
                        <form action="{{route('user.update', [auth()->user()->id])}}" method="POST">
                            @csrf @method('patch')
                            <label for="name">Name: </label>
                            <input id="name"
                                   name="name"
                                   type="text"
                                   value="{{old("name", auth()->user()->name)}}"
                                   class="input-group-text @error("name") is-invalid @enderror">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <label for="email">E-mail: </label>
                            <input id="email"
                                   name="email"
                                   type="text"
                                   value="{{old("email", auth()->user()->email)}}"
                                   class="input-group-text @error("email") is-invalid @enderror">
                            @error("description")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <br>
                            <input class="btn btn-primary" type="submit" value="Save changes">
                        </form>
                        <br>
                        <div>
                            Verification:
                            @if(auth()->user()->is_verified == 1)
                                <p>Your account is verified.</p>
                            @else
                                <p>Your account has not been verified yet.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
