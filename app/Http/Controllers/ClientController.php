<?php
namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Kegiatan; 
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;


class ClientController extends Controller
{
    public function index() {

        $tahun = Carbon::now()->year;
        $bulan = Carbon::now()->month;
        $donations = Donation::where('is_verify', true)->get();
        $totalDonasi = Donation::where('is_verify', true)->whereYear('created_at', $tahun)->whereMonth('created_at', $bulan)->sum('donation_amount');
        $dataDonation = Donation::where('is_verify', true)->whereYear('created_at', $tahun)->whereMonth('created_at', $bulan)->get();
        $kegiatans = Kegiatan::all(); // Fetch all kegiatan
        // Menghitung total pengeluaran
        $totalPengeluaran = Pengeluaran::sum('jumlah_pengeluaran');
    
        // Menghitung saldo kas
        $saldoKas = $totalDonasi - $totalPengeluaran;
            
        return view('client.index', compact('dataDonation','donations', 'kegiatans','saldoKas','totalDonasi'));
    }
    
    public function storeDonation(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'donation_amount' => 'required|numeric|min:1',
            'phone' => 'required', // Format nomor telepon
        ]);

        // Simpan data donasi ke database
        $donation = Donation::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'donation_amount' => $request->donation_amount,
            'donation_message' => $request->donation_message,
            'anonymous' => $request->has('anonymous'),
            'phone' => $request->phone,
        ]);

        // Buat akun jika email belum terdaftar
        if (!User::where('email', $request->email)->exists()) {
            $randomPassword = Str::random(8);
            $user = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($randomPassword),
                'jabatan' => 'donatur',
            ]);

            session([
                'new_account' => true,
                'username' => $user->email,
                'randomPassword' => $randomPassword,
                'message' => 'Akun baru Anda telah dibuat!',
            ]);
        } else {
            session(['new_account' => false, 'message' => 'Terima kasih sudah berdonasi lagi!']);
        }

        try {
            $whatsappResponse = Http::withHeaders([
                'Authorization' => 'SqFR46v45kVczgLegs2Z',
            ])->post('https://api.fonnte.com/send', [
                'target' => $request->phone,
                'message' => "Halo {$request->nama}, terima kasih telah berdonasi sebesar Rp" . number_format($request->donation_amount, 0, ',', '.') . "." . "\n\n" . "Untuk melihat catatan pengeluaran, klik link berikut: 127.0.0.1/login",
            ]);

            if ($whatsappResponse->failed()) {
                Log::error('Gagal mengirim WhatsApp: ' . $whatsappResponse->body());
            }
        } catch (\Exception $e) {
            Log::error('Exception saat mengirim WhatsApp: ' . $e->getMessage());
        }

        // Midtrans Configuration
        \Midtrans\Config::$serverKey = config('midtrans.serverkey');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => 'DONATION-' . $donation->id . '-' . time(),
                'gross_amount' => $request->donation_amount,
            ],
            'customer_details' => [
                'first_name' => $request->nama,
                'email' => $request->email,
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $donation->snap_token = $snapToken;
        $donation->save();

        return redirect()->route('thank-you', ['order_id' => $donation->id]);
    }

    public function thankYou(Request $request)
    {
        // Ambil donasi berdasarkan ID
        $donation = Donation::find($request->order_id);

        if (!$donation) {
            return redirect('/')->with('error', 'Donasi tidak ditemukan.');
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
