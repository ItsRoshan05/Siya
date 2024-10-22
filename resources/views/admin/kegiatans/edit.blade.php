@extends('layouts.template')

@section('konten')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Kegiatan</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('kegiatans.update', $kegiatan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_kegiatan">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" value="{{ $kegiatan->nama_kegiatan }}" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required>{{ $kegiatan->deskripsi }}</textarea>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $kegiatan->tanggal }}" required>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ $kegiatan->lokasi }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('kegiatans.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
