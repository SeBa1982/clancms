@extends('layouts.app')

@section('content')
    @foreach ($posts as $post)
    <div class="card bg-dark text-white mb-3">
        <img src="{{ $post->image ? asset('storage/'.$post->image) : 'http://www.loremimages.com?size=854x150' }}" class="card-img-top" alt="..." width="854px" height="150">
        <div class="card-img-overlay text-dark">{{ $post->description }}</div>
        <div class="card-header h3 fw-bolder">{{ $post->title }}</div>
        <div class="card-body">
            {{ $post->content }}
        </div>
        <div class="card-footer">
            Autor: ...
        </div>
    </div>
    @endforeach

@endsection
