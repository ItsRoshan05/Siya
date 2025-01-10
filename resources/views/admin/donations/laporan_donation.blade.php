@extends('layouts.template')

@section('konten')
<div class="container">
    <h2 class="mt-4">Laporan Donasi</h2>
    <form action="{{ route('laporan.donasi') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="start_date">Tanggal Mulai:</label>
                    <input type="date" name="start_date" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="end_date">Tanggal Akhir:</label>
                    <input type="date" name="end_date" class="form-control" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tampilkan Laporan</button>
    </form>

    @if(isset($donations) && $donations->count() > 0)
        <h4 class="mt-4">Hasil Laporan Donasi:</h4>
        <ul class="list-group">
            @foreach($donations as $pengeluaran)
                <li class="list-group-item">
                    <strong>{{ $pengeluaran->nama }}</strong> - 
                    Rp{{ number_format($pengeluaran->donation_amount, 0, ',', '.') }} 
                    <span class="float-end">{{ $pengeluaran->created_at }}</span>
                </li>
            @endforeach
        </ul>

        <div class="mt-4">
            <a href="{{ route('laporan.donasi.pdf', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}" class="btn btn-danger">Export PDF</a>
            <!-- <a href="{{ route('laporan.pengeluaran.excel', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}" class="btn btn-success">Export Excel</a> -->
        </div>
    @else
        <p class="mt-4">Tidak ada data pengeluaran pada rentang tanggal yang dipilih.</p>
    @endif
</div>
@endsection
