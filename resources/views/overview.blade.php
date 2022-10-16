@extends('layouts/app')

{{--@section('title')--}}
{{--    {{$title}}--}}
{{--@endsection--}}

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
{{--            <h1>{{$title}}</h1>--}}
            <div class="card">
                <table class="table">
                    <tr>
                        <th>name</th>
                        <th>description</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($playlist as $play)
                        <tr>
                            <td>{{$play->name}}</td>
{{--                            <td>{{$datas->description}}</td>--}}
{{--                            <td class="col-sm-3"> <img class="img-fluid" src="{{$datas->image}}"></td>--}}
                            <td><a class="btn btn-success">Details</a></td>
                            <td><a class="btn btn-primary">Wijzigen</a></td>
                            <td>
                                <form action="{{route('playlist.destroy', $play->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Verwijderen</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection


