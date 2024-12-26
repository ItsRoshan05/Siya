<?php
namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Kegiatan; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pengeluaran;
class ClientController extends Controller
{
    public function index() {
        $donations = Donation::where('is_verify', true)->get();
        $totalDonasi = Donation::where('is_verify', true)->sum('donation_amount');
        
        $kegiatans = Kegiatan::all(); // Fetch all kegiatan
        // Menghitung total pengeluaran
        $totalPengeluaran = Pengeluaran::sum('jumlah_pengeluaran');
    
        // Menghitung saldo kas
        $saldoKas = $totalDonasi - $totalPengeluaran;
            
        return view('client.index', compact('donations', 'kegiatans','saldoKas'));
    }
    
    public function storeDonation(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'donation_amount' => 'required|numeric|min:0',
            'donation_type' => 'required|string',
            'payment_proof' => 'required|file|mimes:jpg,png,pdf|max:2048',
        ]);
    
        // Simpan file bukti pembayaran
        $paymentProofPath = $request->file('payment_proof')->store('payment_proofs', 'public');
    
        // Simpan data donasi ke database
        $donation = Donation::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'donation_amount' => $request->donation_amount,
            'donation_type' => $request->donation_type,
            'donation_message' => $request->donation_message,
            'anonymous' => $request->has('anonymous'),
            'payment_proof' => $paymentProofPath,
        ]);
    
        // Cek jika email sudah terdaftar
        if (User::where('email', $request->email)->exists()) {
            // Jika email sudah terdaftar, set pesan terima kasih
            session(['new_account' => false, 'message' => 'Terima kasih sudah berdonasi lagi!']);
        } else {
            // Buat password acak
            $randomPassword = Str::random(8);
    
            // Buat akun baru
            $user = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($randomPassword),
                'jabatan' => 'donatur', // Set jabatan sebagai 'donatur'
            ]);
    
            // Simpan informasi akun di session untuk ditampilkan di view
            session([
                'new_account' => true,
                'username' => $user->email,
                'randomPassword' => $randomPassword,
                'message' => 'Akun baru Anda telah dibuat!',
            ]);
        }
    
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverkey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        
        $params = array(
            'transaction_details' => array(
                'order_id' => 'DONATION-' . $donation->id . '-' . time(),
                'gross_amount' => $request->donation_amount,
            ),
            'costumer_details' => array(
                'first_name' => $request->nama,
                'email' => $request->email,
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $donation->snap_token = $snapToken;
        $donation->save();
        
        return redirect()->route('thank-you');
    }
    
    // Fungsi untuk menampilkan halaman terima kasih
    public function thankYou(Request $request)
    {
        // Ambil donasi terakhir
        $donation = Donation::latest()->first();
    
        // Pastikan data donasi ditemukan
        if (!$donation) {
            return redirect()->route('home')->with('error', 'Tidak ada donasi ditemukan.');
        }
    
        // Kirim data ke view
        return view('client.thank-you', [
            'snapToken' => $donation->snap_token,
            'name' => $donation->nama,
            'email' => $donation->email,
            'amount' => $donation->donation_amount,
        ]);
    }
    
}
