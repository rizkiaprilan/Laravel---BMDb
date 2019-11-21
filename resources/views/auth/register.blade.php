@extends('layouts.masterGuest')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-3 col-form-label text-md-right"></label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus
                                           placeholder="Fullname">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-3 col-form-label text-md-right"></label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-3 col-form-label text-md-right"></label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-3 col-form-label text-md-right"></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password"
                                           placeholder="Confirm">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-3 col-form-label text-md-right"></label>

                                <div class="col-md-6">

                                    <input id="gender" type="radio" name="gender" value="male" required> Male &nbsp;&nbsp;
                                    <input id="gender" type="radio" name="gender" value="female" required> Female

                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-3 col-form-label text-md-right"></label>

                                <div class="col-md-6">
                                    <textarea placeholder="Address" id="address"
                                              class="form-control @error('address') is-invalid @enderror" name="address"
                                              required></textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--                            <div class="form-group row">--}}
                            {{--                                <label for="password" class="col-md-3 col-form-label text-md-right"></label>--}}

                            {{--                                <div class="col-md-6">--}}
                            {{--                                    <div class="input-group">--}}
                            {{--                                        <div class="input-group-addon">--}}
                            {{--                                            <i class="fa fa-calendar"></i>--}}
                            {{--                                        </div>--}}
                            {{--                                        <input type="text" name="date" class="form-control"--}}
                            {{--                                               data-inputmask="'alias': 'dd/mm/yyyy'" data-mask--}}
                            {{--                                               placeholder="dd/mm/yyyy">--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="input-group date">--}}
                            {{--                                        <div class="input-group-addon">--}}
                            {{--                                            <i class="fa fa-calendar"></i>--}}
                            {{--                                        </div>--}}
                            {{--                                        <input type="text" class="form-control pull-right" id="datepicker">--}}
                            {{--                                    </div>--}}


                            {{--                                    @error('date')--}}
                            {{--                                    <span class="invalid-feedback" role="alert">--}}
                            {{--                                        <strong>Please fill correctly!</strong>--}}
                            {{--                                    </span>--}}
                            {{--                                    @enderror--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                            <div class="form-group row">
                                <label for="password" class="col-md-3 col-form-label text-md-right"></label>

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
                                <div class="col-md-6 offset-md-5">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
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
