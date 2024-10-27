@extends('layouts.template')

@section('konten')
<div class="container">
    <h2>Tambah User Baru</h2>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf

       
        <div class="form-group mb-3">
            <label for="name">Nama:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        
        <div class="form-group mb-3">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

     
        <div class="form-group mb-3">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="jabatan">Jabatan:</label>
            <select name="jabatan" id="jabatan" class="form-control" required>
                <option value="">Pilih Jabatan</option>
                <option value="Ketua Yayasan">Ketua Yayasan</option>
                <option value="admin">Admin</option>
                <option value="bendahara">Bendahara</option>
            </select>
        </div>


        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Tambah User</button>
    </form>
</div>
@endsection
