@extends('layouts.main')

@section('title')@parent - {{ $title }} @endsection

@section('header')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('send-message') }}">

            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Your name</label>
                <input type="text" class="form-control" id="name" placeholder="Your name" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="email@example.com" name="email">
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Your message</label>
                <textarea class="form-control" id="text" rows="3" name="text"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
@endsection
