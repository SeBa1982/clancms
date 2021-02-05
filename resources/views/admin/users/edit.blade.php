@extends('layouts.admin')

@section('content')
<div class="container ">
    <div class="card bg-dark text-white">
        <div class="card-header h3 fw-bold">User bearbeiten</div>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                {{-- Email --}}
                <div class="form-group row mb-2">
                    <label for="email" class="col-md-1 col-form-label text-md-right">Email</label>
                    <div class="col-md-4">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- Name --}}
                <div class="form-group row mb-2">
                    <label for="name" class="col-md-1 col-form-label text-md-right">Name</label>
                    <div class="col-md-4">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="roles" class="col-md-1 col-form-label text-md-right">Roles</label>
                    <div class="col-md-4">
                        @foreach ($roles as $role)
                        <div class="form-check mt-2">
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                            @if ($user->roles->pluck('id')->contains($role->id))
                                checked
                            @endif>
                            <label>{{ $role->name }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
