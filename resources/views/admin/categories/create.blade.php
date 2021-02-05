@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card bg-dark text-white">
        <div class="card-header h3 fw-bold">neue Kategorie erstellen</div>
        <div class="card-body">
            <form action="{{ isset($categorie) ? route('categories.update', $categorie) : route('categories.store') }}" method="post">
                @isset($categorie)
                    @method('PUT')
                @endisset
                @csrf
                <div class="mb-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="@isset($categorie){{ $categorie->name }}@endisset">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <button type="submit" class="btn btn-success">
                        {{ isset($categorie) ? 'Update' : 'Erstellen'}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
