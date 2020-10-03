@extends($layout)

@section('title')
    BMDb | Add Movie
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header container text-center">Add Movie</div>
                    <div class="card-body">
                        <form action="/addmovie" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                           class="form-control @error('title') is-invalid @enderror" name="title"
                                           value="{{ old('name') }}" required autocomplete="title" autofocus
                                           placeholder="Title">

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="genre"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Genre') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control "
                                            name="genre">

{{--                                        <option value="{{$data->genre}}">{{$data->genre}}</option>--}}
                                        @foreach($genre as $g)
{{--                                            @if($data->genre != $g->name)--}}
                                                <option value="{{$g->name}}" selected>{{$g->name}}</option>
{{--                                            @endif--}}
                                        @endforeach
                                    </select>

                                    @error('genre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                <div class="col-md-6 ">
                                    <textarea placeholder="Description" id="description"
                                              class="form-control @error('description') is-invalid @enderror"
                                              name="description"
                                              required></textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Rating') }}</label>

                                <div class="col-md-6">
                                    <input id="rating" type="rating"
                                           class="form-control @error('rating') is-invalid @enderror" name="rating"
                                           required autocomplete="new-password" placeholder="Rating">

                                    @error('rating')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="photo"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Movie Picture') }}</label>

                                <div class="col-md-6">
                                    <input id="file" type="file" class="form-control" name="photo" required
                                           placeholder="Choose File">

                                    @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
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
