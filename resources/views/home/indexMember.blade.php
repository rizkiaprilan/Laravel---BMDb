{{--@extends('layouts.masterMember')--}}

{{--@section('title')--}}
{{--    BMDb--}}
{{--@endsection--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="col-md-8">--}}
{{--                        <form action="/search" method="get">--}}
{{--                            <div class="form-group">--}}
{{--                                <table>--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            <input type="search" name="search" class="form-control"--}}
{{--                                                   placeholder="Search Movies">--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <span class="form-group-btn"></span>--}}
{{--                                            <button type="submit" class="btn btn-primary">search</button>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                            <label>--}}
{{--                                @if($data->count() == 0)--}}
{{--                                    Movies Doesn't Exists--}}
{{--                                @endif--}}
{{--                            </label>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                    <table class="table">--}}
{{--                        @foreach($data as $d)--}}
{{--                            <tr>--}}
{{--                                <td rowspan="4"><img src="storage/MoviePicture/{{$d->photo}}" alt="Image"--}}
{{--                                                     class="img-thumbnail"></td>--}}
{{--                                <td>{{$d->title}}</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>{{$d->genre}}</td>--}}

{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>{{$d->description}}</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td><span style="color: gold; font-size: 22px">&#128970;</span>{{$d->rating}}</td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                    </table>--}}
{{--                    {{$data->links()}}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
