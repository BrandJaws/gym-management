@extends('_layouts.admin')
@section('form-title', 'Log In')
@section('content')
    <form method="POST" action="">
        @csrf

        <div class="form-group loginFields">
            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <input id="email" type="email" class="form-control" name="email" value="" required autocomplete="email" autofocus>

{{--            @error('email')--}}
{{--            <span class="invalid-feedback" role="alert">--}}
{{--                    <strong>{{ $message }}</strong>--}}
{{--                </span>--}}
{{--            @enderror--}}
        </div>

        <div class="form-group ">
            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">

{{--            @error('password')--}}
{{--            <span class="invalid-feedback" role="alert">--}}
{{--                    <strong>{{ $message }}</strong>--}}
{{--                </span>--}}
{{--            @enderror--}}
        </div>

        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>

{{--            @if (Route::has('password.request'))--}}
                <a class="btn btn-link" href="{{url('password/reset')}}">
                    {{ __('Forgot Your Password?') }}
                </a>
{{--            @endif--}}
        </div>
    </form>
@endsection




