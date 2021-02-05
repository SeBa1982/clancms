@extends('layouts.admin')

@section('content')
    <div class="container ">
        <div class="card bg-dark text-white">
            <div class="card-header h3 fw-bold">User Liste</div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Rollen</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach ($user->roles()->get()->pluck('name')->toArray() as $item)
                                        @if ($item == 'admin')
                                            <span class="badge bg-danger text-dark">{{ $item }}</span>
                                        @endif
                                        @if ($item == 'member')
                                            <span class="badge bg-success text-dark">{{ $item }}</span>
                                        @endif
                                        @if ($item == 'user')
                                            <span class="badge bg-info text-dark">{{ $item }}</span>
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @can('edit-users')
                                        <a href="{{ route('users.edit', $user->id) }}"><button class="btn btn-primary btn-sm float-start mx-2">Edit</button></a>
                                    @endcan
                                    @can('delete-users')
                                        <form action="{{ route('users.destroy', $user) }}" method="post" class="float-start">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                        </form>
                                    @endcan

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection
