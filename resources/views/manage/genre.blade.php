@extends($layout)

@section('title')
    BMDb | Data Genre
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <a href="/manage/addgenre" class="container text-center">
                        <button type="button" class="container text-center btn btn-danger"
                                style="width: 100px; height: auto">Add Genre
                        </button>
                    </a>
                    <br>
                    <label style="font-size: 30px">Manage Genre</label>
                    <table class="table" style="font-size: 10px">
                        <tr>
                            <th>#</th>
                            <th style="width: 550px;height: auto">Name</th>
                            <th>Action</th>
                        </tr>

                        @foreach($data as $d)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$d->name}}</td>
                                <td>
                                    <a href="/manage/updategenre/{{$d->id}}">
                                        <button style="font-size: 10px; width: 55px;height: 30px" type="button"
                                                class="btn btn-danger">Edit
                                        </button>
                                    </a>
                                    <a href="/manage/deletegenre/{{$d->id}}">
                                        <button type="button" style="font-size: 10px;width: 55px;height: 30px"
                                                class="btn btn-danger">Delete
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
