@extends('layouts.appauth')

@section('content')
<div class="text-center">
    <h5 class="mb-0">Reset Password</h5>
    <p class="text-muted mt-2">Reset Password with Minia.</p>
</div>
@if (session('status'))
<div class="alert alert-success text-center my-4" role="alert">
    {{ session('status') }}
</div>
@endif

<form class="mt-4" method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label" for="email">Email</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="email" placeholder="Enter email">
        @error('email')
        <div class="invalid-feedback" role="alert">
            {{ $message }}
        </div> 
        @enderror
    </div>
    <div class="mb-3 mt-4">
        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Reset</button>
    </div>
</form>

<div class="mt-5 text-center">
    <p class="text-muted mb-0">Remember It ?  <a href="{{ route('login') }}"
            class="text-primary fw-semibold"> Sign In </a> </p>
</div>
@endsection
