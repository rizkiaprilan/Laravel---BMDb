@extends($layout)

@section('title')
    BMDb | Data Movie
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <a href="/manage/addmovie" class="container text-center">
                        <button type="button" class="container text-center btn btn-danger"
                                style="width: 100px; height: auto">Add Movie
                        </button>
                    </a>
                    <br>
                    <label style="font-size: 30px">Manage Movie</label>
                    <table class="table" style="font-size: 10px">
                        <tr>
                            <th>#</th>
                            <th>Posted By</th>
                            <th>Genre</th>
                            <th>Title</th>
                            <th>Picture</th>
                            <th>Description</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>

                        @foreach($data as $d)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>Admin</td>
                                <td>{{$d->genre}}</td>
                                <td>{{$d->title}}</td>
                                <td><img src="/storage/MoviePicture/{{$d->photo}}" alt="Image"
                                         style="width: 100px; height: auto"></td>
                                <td>{{$d->description}}</td>
                                <td>{{$d->rating}}</td>
                                {{--                                @if(Auth::user()->id != $d->id)--}}
                                <td>
                                    <a href="/manage/updatemovie/{{$d->id}}">
                                        <button style="font-size: 10px; width: 55px;height: 30px" type="button"
                                                class="btn btn-danger">Edit
                                        </button>
                                    </a>
                                    <a href="/manage/deletemovie/{{$d->id}}">
                                        <button type="button" style="font-size: 10px;width: 55px;height: 30px"
                                                class="btn btn-danger">Delete
                                        </button>
                                    </a>
                                </td>
                                {{--                                @endif--}}

                            </tr>
                        @endforeach
                    </table>
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
