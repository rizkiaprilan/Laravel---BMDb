@extends($layout)

@section('title')
    BMDb | Data User
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <a href="/manage/adduser" class="container text-center">
                        <button type="button" class="container text-center btn btn-danger"
                                style="width: 100px; height: auto">Add User
                        </button>
                    </a>
                    <br>
                    <label style="font-size: 30px">Manage User</label>
                    <table class="table" style="font-size: 10px">
                        <tr>
                            <th>#</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Profile Picture</th>
                            <th>DOB</th>
                            <th>Action</th>
                        </tr>

                        @foreach($data as $d)
                            <tr>
                                <td>{{$count++}}</td>
                                @if($d->role == "member")
                                    <td><a href="/profile/view/{{$d->id}}"
                                           style="text-decoration: none;">{{$d->name}}</a></td>
                                @else
                                    <td>{{$d->name}}</td>
                                @endif
                                <td>{{$d->email}}</td>
                                <td>{{$d->role}}</td>
                                <td>{{$d->gender}}</td>
                                <td>{{$d->address}}</td>
                                <td><img src="/storage/UserPicture/{{$d->photo}}" alt="Image"
                                         style="width: 100px; height: auto;border-radius: 50%;"></td>
                                <td>{{$d->date}}</td>
                                <td>
                                    <a href="/manage/updateuser/{{$d->id}}">
                                        <button style="font-size: 10px; width: 55px;height: 30px" type="button"
                                                class="btn btn-danger">Edit
                                        </button>
                                    </a>
                                    <a href="/manage/delete/{{$d->id}}">
                                        <button type="button" style="font-size: 10px;width: 55px;height: 30px"
                                                class="btn btn-danger">Delete
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
