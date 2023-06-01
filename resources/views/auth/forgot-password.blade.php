@extends('layouts.master')
@section('title')
    Forgot Password
@endsection
@section('content')
<div class="row">
    <div class="col-12 mx-auto bg-light p-5 rounded-md">
        <h4 class="mb-3">Forgot Password</h4>
        <form action="{{ route('auth.checkEmail')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Enter Your Email</label>
                <input type="email" class="form-control
                @error('email')
                    is-invalid
                @enderror" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <button class="btn btn-warning">Reset Password</button>
            </div>

        </form>
    </div>
    </div>
@endsection
