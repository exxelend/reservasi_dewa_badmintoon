@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">{{ isset($user) ? 'Edit User' : 'Add User' }}</h1>
    <form action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}" method="POST">
        @csrf
        @if(isset($user))
            @method('PUT')
        @endif
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ isset($user) ? $user->name : old('name') }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ isset($user) ? $user->email : old('email') }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
            @if(isset($user))
                <small class="text-muted">Leave blank to keep current password</small>
            @endif
        </div>
        <div class="form-group mb-3">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Update' : 'Add' }} User</button>
    </form>
</div>
@endsection
