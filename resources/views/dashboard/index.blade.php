@extends('layouts.master')
@section('title')
    Dashboard | Home
@endsection
@section('content')
    <h4>Daily Courses</h4>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus dolores magnam modi corrupti, totam obcaecati, ullam, sit hic saepe dicta quam officia. Aliquid tempora a, eum corporis quaerat culpa maiores!</p>
    <div class="alert alert-info">
        {{ session('auth')->name }}
    </div>
    <form action="{{ route('auth.logout') }}" method="post">
        @csrf
        <button class="btn btn-outline-warning">Logout</button>
    </form>
@endsection
