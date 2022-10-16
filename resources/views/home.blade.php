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

                        <a href="{{route('create')}}">Create playlist</a>

{{--                        <div>--}}
{{--                            @foreach($datas as $data)--}}
{{--                                <tr>--}}
{{--                                    <td>{{$data->name}}</td>--}}
{{--                                    <td>{{$data->description}}</td>--}}
{{--                                    <td class="col-sm-3"> <img class="img-fluid" src="{{$data->image}}"></td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>
@endsection
