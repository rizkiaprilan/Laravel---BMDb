@extends($layout)

@section('title')
    BMDb | Inbox
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <table class="table">
                        @foreach($data as $d)
                            <tr>
                                <td rowspan="3">
                                    <img src="/storage/UserPicture/{{$d->photo}}" alt="Image"
                                         class="img-thumbnail" style="width: 100px; height: auto"></td>
                                </td>
                                <td>
                                    <a href="/profile/view/{{$d->receiver}}"
                                       style="text-decoration: none;">{{$d->name}}</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger"><a
                                            href="/inbox/delete/{{$d->id}}"
                                            style="text-decoration: none; color: white">Remove</a>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Posted at: </b> {{$d->created_at}}</td>

                            </tr>
                            <tr>
                                <td>
                                    <b>Message: </b> {{$d->message}}
                                </td>
                            </tr>
                        @endforeach
                        @if($data->count() == 0)
                            <b style="color: darkred">You Don't Have Any Message Yet</b>
                        @endif
{{--                        {{$data->links()}}--}}
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
