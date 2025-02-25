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
                <a href="{{ route('donations.index') }}" class="text-white">Lihat Detail <i
                        class="fas fa-arrow-circle-right"></i></a>
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
                <a href="{{ route('pengeluarans.index') }}" class="text-white">Lihat Detail <i
                        class="fas fa-arrow-circle-right"></i></a>
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
    <!-- Chart Donasi dan Pengeluaran -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <canvas id="donasiPengeluaranChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jstambahan')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Script untuk membuat chart -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('donasiPengeluaranChart').getContext('2d');
        const donasiPengeluaranChart = new Chart(ctx, {
            type: 'line', // Jenis chart (bisa diganti ke 'bar', 'pie', dll)
            data: {
                labels: {!! json_encode($chartLabels) !!}, // Label bulan atau periode
                datasets: [
                    {
                        label: 'Donasi',
                        data: {!! json_encode($chartDonasi) !!}, // Data donasi
                        borderColor: 'rgba(75, 192, 192, 1)', // Warna garis
                        backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna area
                        fill: true,
                    },
                    {
                        label: 'Pengeluaran',
                        data: {!! json_encode($chartPengeluaran) !!}, // Data pengeluaran
                        borderColor: 'rgba(255, 99, 132, 1)', // Warna garis
                        backgroundColor: 'rgba(255, 99, 132, 0.2)', // Warna area
                        fill: true,
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Grafik Donasi dan Pengeluaran'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection
