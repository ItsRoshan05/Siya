<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Kegiatan;
use App\Models\Pengeluaran;
use Carbon\Carbon;

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
    
        // Data untuk chart (12 bulan terakhir)
        $chartLabels = [];
        $chartDonasi = [];
        $chartPengeluaran = [];
    
        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $chartLabels[] = $month->format('M Y');
    
            // Hitung total donasi terverifikasi per bulan
            $totalDonasiBulan = Donation::where('is_verify', true)
                ->whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->sum('donation_amount');
            $chartDonasi[] = $totalDonasiBulan;
    
            // Hitung total pengeluaran per bulan
            $totalPengeluaranBulan = Pengeluaran::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->sum('jumlah_pengeluaran');
            $chartPengeluaran[] = $totalPengeluaranBulan;
        }
    
        // Mengirim data ke view
        return view('admin.index', compact(
            'totalDonasi',
            'totalPengeluaran',
            'saldoKas',
            'chartLabels',
            'chartDonasi',
            'chartPengeluaran'
        ));
    }

    public function testing(){
        $donations = Donation::where('is_verify', true)->get();
        $kegiatans = Kegiatan::all();

        return view('admin.donations_kegiatans', compact('donations', 'kegiatans'));
    }
    
}
