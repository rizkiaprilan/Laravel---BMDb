@extends($layout)

@section('title')
    BMDb | {{$data->title}}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <table class="table">
                        <tr>
                            <td rowspan="5"><img src="/storage/MoviePicture/{{$data->photo}}" alt="Image"
                                                 style="width: 200px; height: auto"></td>
                            <td><a href="">{{$data->title}}</a></td>
                        </tr>
                        <tr>
                            <td>{{$data->genre}}</td>

                        </tr>
                        <tr>
                            <td>{{$data->description}}</td>
                        </tr>
                        <tr>
                            <td><span style="color: gold; font-size: 22px">&#128970;</span>{{$data->rating}}</td>
                        </tr>
                        <tr>
                            <td>Posted at: {{$data->created_at}}</td>
                        </tr>

                        @foreach($comment as $c)
                            <tr>
                                <td rowspan="3"><img src="/storage/UserPicture/{{$c->user->photo}}" alt="Image"
                                                     style="width: 150px; height: auto; border-radius: 50%;"></td>
                                </td>
                                <td>
                                    @if(Auth::user() != null)
                                        <a href="/profile/view/{{$c->user->id}}"
                                           style="text-decoration: none">{{$c->user->name}}</a>
                                    @else
                                        <a href="{{ route('login') }}"
                                           style="text-decoration: none">{{$c->user->name}}</a>
                                    @endif
                                </td>
                                @if(Auth::user() != null)
                                    @if( Auth::user()->name == $c->user->name)
                                        <td>
                                            <button type="button" class="btn btn-danger"><a
                                                    href="/home/delete/{{$c->id}}"
                                                    style="text-decoration: none; color: white">Delete</a>
                                            </button>
                                        </td>
                                    @endif
                                @endif
                            </tr>
                            <tr>
                                <td>Comment At: {{$c->created_at}}</td>
                            </tr>
                            <tr>
                                <td>{{$c->comment}}</td>
                            </tr>
                        @endforeach
                    </table>
                    @if(Auth::user() != null)
                        <table>
                            <tr>
                                <form method="POST" action="/home" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-md-10 offset-md-1 ">
                                    <textarea placeholder="Comment" id="comment"
                                              class="form-control @error('comment') is-invalid @enderror" name="comment"
                                              required></textarea>
                                            @error('comment')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <input type="hidden" name="movie_id" value="{{$data->id}}">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-5">
                                            <button type="submit" class="btn btn-primary">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </tr>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
