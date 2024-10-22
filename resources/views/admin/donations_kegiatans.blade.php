@extends('layouts.template')

@section('konten')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Data Donasi</h2>
    <div class="row">
        @forelse($donations as $donation)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Donatur: {{ $donation->nama }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><strong>Email:</strong> {{ $donation->email }}</p>
                        <p class="card-text"><strong>Jumlah Donasi:</strong> 
                            <span class="badge badge-success">Rp{{ number_format($donation->donation_amount, 0, ',', '.') }}</span>
                        </p>
                        <p class="card-text"><strong>Tipe Donasi:</strong> {{ $donation->donation_type }}</p>
                        @if($donation->donation_message)
                            <p class="card-text"><strong>Pesan:</strong> "{{ $donation->donation_message }}"</p>
                        @endif
                        <p class="card-text"><strong>Tanggal:</strong> {{ $donation->created_at->format('d M Y') }}</p>
                        @if($donation->anonymous)
                            <p class="text-muted"><em>Donasi ini dilakukan secara anonim</em></p>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">Tidak ada data donasi.</p>
            </div>
        @endforelse
    </div>

    <h2 class="mt-5 mb-4 text-center">Data Kegiatan</h2>
    <div class="row">
        @forelse($kegiatans as $kegiatan)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-info text-white">
                        <h5 class="card-title mb-0">{{ $kegiatan->nama_kegiatan }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><strong>Deskripsi:</strong> {{ $kegiatan->deskripsi }}</p>
                        <p class="card-text"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d M Y') }}</p>
                        <p class="card-text"><strong>Lokasi:</strong> {{ $kegiatan->lokasi }}</p>
                        <p class="card-text"><strong>Total Donasi:</strong> 900000</p>
                        <p class="card-text"><strong>Total Pengeluaran:</strong>200000</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">Tidak ada data kegiatan.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
