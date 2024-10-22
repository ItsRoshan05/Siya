@extends('layouts.template')

@section('csstambahan')
<!-- Tambahkan CSS tambahan jika diperlukan -->
@endsection

@section('konten')
<h1 class="mb-4">Selamat Datang di Dashboard Yayasan Al-Rasyid</h1>

<div class="row">
    <!-- Card untuk Total Donasi -->
    <div class="col-md-4">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">
                <h4><i class="fas fa-donate"></i> Total Donasi</h4>
                <p class="display-4">{{ number_format($totalDonasi, 2) }}</p>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="{{ route('donations.index') }}" class="text-white">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Card untuk Total Pengeluaran -->
    <div class="col-md-4">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">
                <h4><i class="fas fa-money-bill-wave"></i> Total Pengeluaran</h4>
                <p class="display-4">{{ number_format($totalPengeluaran, 2) }}</p>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="{{ route('pengeluarans.index') }}" class="text-white">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Card untuk Saldo Kas -->
    <div class="col-md-4">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">
                <h4><i class="fas fa-wallet"></i> Saldo Kas Saat Ini</h4>
                <p class="display-4">{{ number_format($saldoKas, 2) }}</p>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <span>&nbsp;</span>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jstambahan')
<!-- Tambahkan JavaScript tambahan jika diperlukan -->
@endsection
