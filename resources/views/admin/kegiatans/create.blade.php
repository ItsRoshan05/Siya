@extends('layouts.template')

@section('konten')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Kegiatan</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('kegiatans.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_kegiatan">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" name="lokasi" id="lokasi" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('kegiatans.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
