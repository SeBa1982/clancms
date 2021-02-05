@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card bg-dark text-white">
        <div class="card-header h3 fw-bold">Beiträge <a href="{{ route('posts.create') }}" class="btn btn-success btn-sm">neuer Beitrag</a></div>
        <div class="card-body">
            <div class="table">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Titel</th>
                            <th scope="col">Beschreibung</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($posts->count() > 0)
                        @foreach ($posts as $post)
                        <tr>
                           <th scope="row">{{ $post->id }}</th>
                           <td><img src="{{ asset('storage/'.$post->image) }}" alt="" width="50px" height="50px"></td>
                           <td>{{ $post->title }}</td>
                           <td>{{ $post->description }}</td>
                           <td>
                               @if (!$post->trashed())
                                <a href="{{ route('posts.edit' , $post) }}" class="btn btn-info btn-sm float-start mx-2">Edit</a>
                               @endif

                               <form action="{{ route('posts.destroy', $post) }}" method="post" class="float-start">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    {{ $post->trashed() ? 'Delete' : 'Papierkorb' }}
                                </button>
                                </form>
                           </td>
                        </tr>
                        @endforeach
                        @else
                        <td colspan="5"><h3 class="text-center">Keine Beiträge vorhanden</h3></td>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
