@extends('layouts.main')

@section('title')@parent - {{ $title }} @endsection

@section('header')
    @parent
@endsection

@section('content')

    <div class="container">
        <form method="post" action="{{ route('login') }}">

            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="email@example.com" name="email" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Authorization</button>
        </form>
    </div>

@endsection
