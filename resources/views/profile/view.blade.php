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
                            <td rowspan="3"><img src="/storage/UserPicture/{{$data->photo}}" alt="Image"
                                                 style="width: 130px; height: auto"></td>
                            <td><a href="">{{$data->name}}</a></td>
                            <td>
                                @if(Auth::user()->name == $data->name)
                                    <button type="button" class="btn btn-danger"><a
                                            href="/profile/edit/{{$data->id}}"
                                            style="text-decoration: none; color: white">Update Profile</a>
                                    </button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{$data->email}}</td>

                        </tr>
                        <tr>
                            <td>{{$data->address}}</td>
                        </tr>
                    </table>
                    </table>
                    <table>
                        <tr>
                            <form method="POST" action="/inbox" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-10 offset-md-1 ">
                                    <textarea placeholder="Send Massage" id="message"
                                              class="form-control @error('message') is-invalid @enderror" name="message"
                                              required></textarea>
                                        @error('message')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>
{{--                                <input type="hidden" name="movie_id" value="{{$data->id}}">--}}
                                <input type="hidden" name="user_id" value="{{ $data->id }}">
                                <input type="hidden" name="receiver" value= "{{Auth::user()->id}}">
                                <input type="hidden" name="name" value= "{{Auth::user()->name}}">
                                <input type="hidden" name="photo" value= "{{Auth::user()->photo}}">
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
                </div>
            </div>
        </div>
    </div>

@endsection
