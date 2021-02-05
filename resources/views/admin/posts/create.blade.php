@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card bg-dark text-white">
        <div class="card-header h3 fw-bold">neuen Beitrag erstellen</div>
        <div class="card-body">
            <form action="{{ isset($post) ? route('posts.update', $post) : route('posts.store') }}" method="post" enctype="multipart/form-data">
                @isset($post)
                    @method('PUT')
                @endisset
                @csrf
                <div class="mb-2">
                    <label for="title" class="form-label">Titel</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        value="@isset($post){{ $post->title }}@endisset">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                        value="@isset($post){{ $post->description }}@endisset">
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" id="content" cols="5" rows="5" class="form-control @error('content') is-invalid @enderror">@isset($post){{ $post->content }}@endisset</textarea>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="published_at" class="form-label">Published At</label>
                    <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror" id="published_at" name="published_at"
                        value="@isset($post){{ $post->published_at }}@endisset">
                    @error('published_at')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="file" class="form-label">Titelbild</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                        value="@isset($post){{ $post->file }}@endisset">
                    @error('file')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <button type="submit" class="btn btn-success">
                        {{ isset($post) ? 'Update' : 'Erstellen'}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
