@extends($layout)

@section('title')
    BMDb | {{Auth::user()->name}}'s Bookmarks
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <table class="table">
                        @foreach($saved as $s)
                                <tr>
                                    <td rowspan="5"><img src="/storage/MoviePicture/{{$s->movie->photo}}" alt="Image"
                                                         style="width: 200px; height: auto"></td>
                                    <td><a href="/home/view/{{$s->movie_id}}">{{$s->movie->title}}</a></td>
                                    <td><a href="/bookmark/delete/{{$s->id}}"
                                           style="text-decoration: none; color: white">
                                            <button class="btn btn-danger">Remove</button>
                                            Delete</a></td>
                                </tr>
                                <tr>
                                    <td >{{$s->movie->genre}}</td>

                                </tr>
                                <tr>
                                    <td>{{$s->movie->description}}</td>
                                </tr>
                                <tr>
                                    <td ><span style="color: gold; font-size: 22px">&#128970;</span>{{$s->movie->rating}}
                                    </td>
                                </tr>
                                <tr >
                                    <td >Posted at: {{$s->created_at}}</td>
                                </tr>
                        @endforeach
                        @if($saved->count() == 0)
                            <b style="color: darkred">Data Doesn't Exists</b>
                        @endif
                    </table>
                    {{$saved->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
