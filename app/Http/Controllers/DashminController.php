<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Pengeluaran;
class DashminController extends Controller
{
    //
    public function index()
    {
        // Menghitung total donasi
        $totalDonasi = Donation::sum('donation_amount');

        // Menghitung total pengeluaran
        $totalPengeluaran = Pengeluaran::sum('jumlah_pengeluaran');

        // Menghitung saldo kas
        $saldoKas = $totalDonasi - $totalPengeluaran;

        // Mengirim data ke view
        return view('admin.index', compact('totalDonasi', 'totalPengeluaran', 'saldoKas'));
    }
}
