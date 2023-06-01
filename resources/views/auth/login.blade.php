@extends('layouts.master')
@section('title')
    Login
@endsection
@section('content')
<div class="row">
    <div class="col-12 mx-auto bg-light p-5 rounded-md">
        <h4 class="mb-3">Student Login</h4>
        @if (session("message"))
            <div class=" alert alert-success">{{session("message")}}</div>
        @endif
        <form action="{{ route('auth.check') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control
                @error('email')
                    is-invalid
                @enderror" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control
                @error('password')
                    is-invalid
                @enderror" name="password" value="{{ old('password') }}">
                @error('password')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <button class="btn btn-warning">Login</button>
                <a href="{{route('auth.forgotPassword')}}" class="btn btn-link text-warning">Forget Password?</a>
            </div>

        </form>
    </div>
    </div>
@endsection
