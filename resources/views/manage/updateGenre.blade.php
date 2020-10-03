@extends($layout)

@section('title')
    BMDb | Update Genre
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header container text-center">Update Genre</div>
                    <div class="card-body">
                        <form action="/manage/updategenre" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="id" value="{{$data->id}}">
                            </div>
                            <div class="form-group row">
                                <label for="genre"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Genre') }}</label>

                                <div class="col-md-6">
                                    <input id="genre" type="text"
                                           class="form-control @error('genre') is-invalid @enderror" name="name"
                                           value="{{$data->name}}" required autocomplete="genre" autofocus
                                           placeholder="Genre Name">

                                    @error('genre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
