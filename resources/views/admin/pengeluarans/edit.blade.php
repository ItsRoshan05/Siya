@extends('layouts.template')

@section('konten')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Pengeluaran</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('pengeluarans.update', $pengeluaran->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_pengeluaran">Nama Pengeluaran</label>
                <input type="text" class="form-control" id="nama_pengeluaran" name="nama_pengeluaran" value="{{ $pengeluaran->nama_pengeluaran }}" required>
            </div>
            <div class="form-group">
                <label for="jumlah_pengeluaran">Jumlah Pengeluaran</label>
                <input type="number" class="form-control" id="jumlah_pengeluaran" name="jumlah_pengeluaran" value="{{ $pengeluaran->jumlah_pengeluaran }}" required>
            </div>
            <div class="form-group">
                <label for="tanggal_pengeluaran">Tanggal Pengeluaran</label>
                <input type="date" class="form-control" id="tanggal_pengeluaran" name="tanggal_pengeluaran" value="{{ $pengeluaran->tanggal_pengeluaran }}" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan">{{ $pengeluaran->keterangan }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('pengeluarans.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
