@extends('_layouts.admin')
@section('form-title', 'Reset')
@section('content')
    <form method="POST" action="">
        @csrf

        {{--        <input type="hidden" name="token" value="{{ $token }}">--}}

        <div class="form-group loginFields">
            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control" name="email" value="" required autocomplete="email" autofocus>

            {{--            @error('email')--}}
            {{--            <span class="invalid-feedback" role="alert">--}}
            {{--                    <strong>{{ $message }}</strong>--}}
            {{--                </span>--}}
            {{--            @enderror--}}
        </div>

        <div class="form-group loginFields">
            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">

            {{--            @error('password')--}}
            {{--            <span class="invalid-feedback" role="alert">--}}
            {{--                    <strong>{{ $message }}</strong>--}}
            {{--                </span>--}}
            {{--            @enderror--}}
        </div>

        <div class="form-group registerFields">
            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                {{ __('Reset Password') }}
            </button>
        </div>
    </form>
@endsection
