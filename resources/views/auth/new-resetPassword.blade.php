@extends('layouts.master')
@section('title')
    Reset Password
@endsection
@section('content')
<div class="row">
    <div class="col-12 mx-auto bg-light p-5 rounded-md">
        <h4 class="mb-3">Reset Password</h4>
        <form action="{{ route('auth.resetPassword')}}" method="post">
            @csrf

            <input type="hidden" name="user_token" value="{{$user_token}}">

            <div class="mb-3">
                <label for="" class="form-label">New Password</label>
                <input type="password" class="form-control
                @error('password')
                    is-invalid
                @enderror" name="password" value="{{ old('password') }}">
                @error('password')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label"> Confirm Password</label>
                <input type="password" class="form-control
                @error('password_confirmation')
                    is-invalid
                @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <button class="btn btn-warning">Reset Now</button>
            </div>

        </form>
    </div>
    </div>
@endsection
