@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-top: 30px;background-color: whitesmoke;margin-bottom: 20px;padding: 20px">
        <div class="col-md-6">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group col-md-12">
                                    <label>{{ __('label.email') }}</label>

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group col-md-12">
                                    <label>{{ __('label.password') }}</label>

                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ trans('label.remember') }}
                                    </label>
                                </div>
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('label.login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ trans('label.reset_password') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class=" row mb-0">
                            <div class="col-md-8 mb-2">
                                <h3  style="font-size: 15px">{!! trans('label.register_help') !!} <a href="{!! route('register') !!}">
                                        {!! trans('label.register') !!}
                                    </a></h3>
                            </div>



                        </div>

                    </form>

        </div>

        <div class="col-md-6">
            <img src="{!! url('assets/images/content/logo.png') !!}" alt="logo" style="margin-top: 70px;margin-left: 10px" width="60%">
        </div>
    </div>
</div>
@endsection
