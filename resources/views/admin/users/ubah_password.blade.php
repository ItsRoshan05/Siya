@extends('layouts.template')

@secti]on('konten')
<div class="container">
    <h2>Ganti Password</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Current Password Field -->
        <div class="form-group mb-3">
            <label for="current_password">Password Lama:</label>
            <input type="password" name="current_password" id="current_password" class="form-control" required>
        </div>

        <!-- New Password Field -->
        <div class="form-group mb-3">
            <label for="new_password">Password Baru:</label>
            <input type="password" name="new_password" id="new_password" class="form-control" required>
        </div>

        <!-- Confirm New Password Field -->
        <div class="form-group mb-3">
            <label for="new_password_confirmation">Konfirmasi Password Baru:</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Ganti Password</button>
    </form>
</div>
@endsection
