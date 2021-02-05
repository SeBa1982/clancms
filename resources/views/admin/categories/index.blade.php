@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card bg-dark text-white">
        <div class="card-header h3 fw-bold">Kategorien <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm">neue Kategorie</a></div>
        <div class="card-body">
            <div class="table">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($categories->count() > 0)
                        @foreach ($categories as $categorie)
                        <tr>
                            <th scope="row">{{ $categorie->id }}</th>
                            <td>{{ $categorie->name }}</td>
                            <td>
                                @can('manage-categories')
                                    <a href="{{ route('categories.edit', $categorie) }}"><button class="btn btn-primary btn-sm float-start mx-2">Edit</button></a>
                                    <form action="{{ route('categories.destroy', $categorie) }}" method="post" class="float-start">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <td colspan="3"><h3 class="text-center">Keine Kategorien vorhanden</h3></td>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
