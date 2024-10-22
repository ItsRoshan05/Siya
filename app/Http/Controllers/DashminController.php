<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Kegiatan;
use App\Models\Pengeluaran;
class DashminController extends Controller
{
    //
    public function index()
    {
        // Menghitung total donasi yang terverifikasi
        $totalDonasi = Donation::where('is_verify', true)->sum('donation_amount');
    
        // Menghitung total pengeluaran
        $totalPengeluaran = Pengeluaran::sum('jumlah_pengeluaran');
    
        // Menghitung saldo kas
        $saldoKas = $totalDonasi - $totalPengeluaran;
    
        // Mengirim data ke view
        return view('admin.index', compact('totalDonasi', 'totalPengeluaran', 'saldoKas'));
    }

    public function testing(){
        $donations = Donation::where('is_verify', true)->get();
        $kegiatans = Kegiatan::all();

        return view('admin.donations_kegiatans', compact('donations', 'kegiatans'));
    }
    
}
