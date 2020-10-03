@extends($layout)

@section('title')
    BMDb | Home
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="col-md-8">
                        <form action="/search" method="get">
                            <div class="form-group">
                                <table>
                                    <tr>
                                        <td>
                                            <input type="search" name="search" class="form-control"
                                                   placeholder="Search Movies">
                                        </td>
                                        <td>
                                            <span class="form-group-btn"></span>
                                            <button type="submit" class="btn btn-primary">search</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <label>
                                @if($data->count() == 0)
                                    <b style="color: darkred">Movies Doesn't Exists</b>
                                @endif
                            </label>
                        </form>
                    </div>
                    <table class="table">
                        @foreach($data as $d)
                            <tr>
                                <td rowspan="4"><img src="storage/MoviePicture/{{$d->photo}}" alt="Image"
                                                     style="width: 200px; height: auto"></td>
                                <td><a href="/home/view/{{$d->id}}" style="text-decoration: none;">{{$d->title}}</a>
                                </td>
                                @if (Auth::user() != null)
                                    @if(Auth::user()->role == 'member')
                                        <?php
                                        $count = false;
                                        ?>
                                        @foreach($bookmark as $b)
                                            @if(Auth::user()->id == $b->user_id and $d->id == $b->movie_id)
                                                <td><a href="/bookmark/delete/{{$b->id}}"
                                                       style="text-decoration: none; color: white">
                                                        <button class="btn btn-danger">Saved</button>
                                                    </a></td>
                                                <?php
                                                $count = true;
                                                ?>
                                            @endif

                                        @endforeach
                                        @if($count == false)
                                            <td><a href="/bookmark/view/{{$d->id}}"
                                                   style="text-decoration: none; color: white">
                                                    <button class="btn btn-danger">Save</button>
                                                </a></td>

                                        @endif
                                    @endif
                                @endif

                            </tr>
                            <tr>
                                <td colspan="2">{{$d->genre}}</td>

                            </tr>
                            <tr>
                                <td colspan="2">{{$d->description}}</td>
                            </tr>
                            <tr>
                                <td colspan="2"><span
                                        style="color: gold; font-size: 22px">&#128970;</span>{{$d->rating}}</td>
                            </tr>
                        @endforeach
                    </table>
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
