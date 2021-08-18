@extends('layouts.appauth')
@section('title')
{{ trans('login_trans.title_page') }}
@stop
@section('content')
<div class="text-center">
    <h5 class="mb-0">{{ trans('login_trans.Welcome') }}</h5>
    <p class="text-muted mt-2">{{ trans('login_trans.Sign') }}</p>
</div>
<form class="mt-4 pt-2" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">{{ trans('login_trans.Email') }}</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="email" placeholder="Enter Email" >
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>
    <div class="mb-3">
        <div class="d-flex align-items-start">
            <div class="flex-grow-1">
                <label class="form-label">{{ trans('login_trans.Password') }}</label>
            </div>
            <div class="flex-shrink-0">
                <div class="">
                    @if (Route::has('password.request'))
                                    <a class="text-muted" href="{{ route('password.request') }}">
                                        {{ trans('login_trans.Forgot') }}
                                    </a>
                                @endif
                </div>
            </div>
        </div>
        
        <div class="input-group auth-pass-inputgroup">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" >
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember-check" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ trans('login_trans.Remember') }}
                </label>
            </div>  
        </div>
        
    </div>
    <div class="mb-3">
        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">{{ trans('login_trans.Login') }}</button>
    </div>
</form>

<div class="mt-4 pt-2 text-center">
    <div class="signin-other-title">
        <h5 class="font-size-14 mb-3 text-muted fw-medium">- {{ trans('login_trans.Sign_in_with') }} -</h5>
    </div>

    <ul class="list-inline mb-0">
        <li class="list-inline-item">
            <a href="javascript:void()"
                class="social-list-item bg-primary text-white border-primary">
                <i class="mdi mdi-facebook"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="javascript:void()"
                class="social-list-item bg-info text-white border-info">
                <i class="mdi mdi-twitter"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="javascript:void()"
                class="social-list-item bg-danger text-white border-danger">
                <i class="mdi mdi-google"></i>
            </a>
        </li>
    </ul>
</div>

<div class="mt-5 text-center">
    <p class="text-muted mb-0">{{ trans('login_trans.account') }}<a href="{{ route('register') }}"
            class="text-primary fw-semibold"> {{ trans('login_trans.Signup') }}</a> </p>
</div>
@endsection
