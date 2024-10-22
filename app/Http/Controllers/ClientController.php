<?php
namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Kegiatan; // Import Kegiatan model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ClientController extends Controller
{
    public function index() {
        $donations = Donation::where('is_verify', true)->get();
        $kegiatans = Kegiatan::all(); // Fetch all kegiatan
        return view('client.index', compact('donations', 'kegiatans'));
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
    
        // Redirect ke halaman terima kasih
        return redirect()->route('thank-you');
    }
    
    // Fungsi untuk menampilkan halaman terima kasih
    public function thankYou()
    {
        return view('client.thank-you');
    }
}
