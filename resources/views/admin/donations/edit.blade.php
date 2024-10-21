<!-- resources/views/admin/donations/edit.blade.php -->
@extends('layouts.template')

@section('konten')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Donation</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ route('donations.update', $donation->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $donation->nama }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $donation->email }}" required>
            </div>

            <div class="form-group">
                <label for="donation_amount">Jumlah Donasi:</label>
                <input type="number" class="form-control" id="donation_amount" name="donation_amount" value="{{ $donation->donation_amount }}" required>
            </div>

            <div class="form-group">
                <label for="donation_type">Tipe Pembayaran:</label>
                <input type="text" class="form-control" id="donation_type" name="donation_type" value="{{ $donation->donation_type }}" required>
            </div>

            <div class="form-group">
                <label for="donation_message">Pesan Donasi:</label>
                <textarea class="form-control" id="donation_message" name="donation_message">{{ $donation->donation_message }}</textarea>
            </div>

            <div class="form-group">
                <label for="payment_proof">Bukti Pembayaran:</label>
                <input type="file" class="form-control" id="payment_proof" name="payment_proof">
                @if ($donation->payment_proof)
                    <img src="{{ asset('storage/' . $donation->payment_proof) }}" alt="Bukti Pembayaran" style="width:100px; height:auto;">
                @endif
            </div>

            <div class="form-group">
                <label for="is_verify">Verifikasi:</label>
                <select class="form-control" id="is_verify" name="is_verify">
                    <option value="1" {{ $donation->is_verify ? 'selected' : '' }}>Verified</option>
                    <option value="0" {{ !$donation->is_verify ? 'selected' : '' }}>Not Verified</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('donations.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection
