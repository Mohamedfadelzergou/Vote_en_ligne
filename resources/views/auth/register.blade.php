@extends('layouts.appauth')
@section('title')
{{trans('register_trans.title_page')}}
@stop
@section('content')
<div class="text-center">
    <h5 class="mb-0">{{trans('register_trans.Register')}}</h5>
    <p class="text-muted mt-2">{{trans('register_trans.Welcome')}}</p>
</div>
<form class="needs-validation mt-4 pt-2" novalidate method="POST" action="{{ route('register') }}">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">{{trans('register_trans.Email')}}</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" id="email" placeholder="Enter email" >  
        @error('email')
        <div class="invalid-feedback" role="alert">
            {{ $message }}
        </div> 
        @enderror
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">{{trans('register_trans.Name')}}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus id="name" placeholder="Enter name" >
        @error('name')
        <div class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </div> 
        @enderror
    </div>

    <div class="mb-3">
        <label for="upassword" class="form-label">{{trans('register_trans.Password')}}</label>
        <input type="password"  id="password" placeholder="Enter password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        @error('password')
        <div class="invalid-feedback" role="alert">
            {{ $message }}
        </div>     
        @enderror 
    </div>
    <div class="mb-3">
        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">{{trans('register_trans.Register')}}</button>
    </div>
</form>

<div class="mt-4 pt-2 text-center">
    <div class="signin-other-title">
        <h5 class="font-size-14 mb-3 text-muted fw-medium">- {{trans('register_trans.Sign_up_using')}} -</h5>
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
    <p class="text-muted mb-0">{{trans('register_trans.Already')}} <a href="{{ route('login') }}"
            class="text-primary fw-semibold"> {{trans('register_trans.Login')}} </a> </p>
</div>
@endsection
