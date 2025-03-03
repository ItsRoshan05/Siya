<!-- resources/views/admin/doantur/edit.blade.php -->
@extends('layouts.template')

@section('konten')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit donatur</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ route('donaturs.update', $donatur->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="name" value="{{ $donatur->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $donatur->email }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('donaturs.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection
