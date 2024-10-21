<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ClientController extends Controller
{
    //
    public function index(){
        $donations = Donation::all();
        return view('client.index', compact('donations'));
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
        Donation::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'donation_amount' => $request->donation_amount,
            'donation_type' => $request->donation_type,
            'donation_message' => $request->donation_message,
            'anonymous' => $request->has('anonymous'),
            'payment_proof' => $paymentProofPath,
        ]);

        // Redirect ke halaman terima kasih
        return redirect()->route('thank-you');
    }

    // Fungsi untuk menampilkan halaman terima kasih
    public function thankYou()
    {
        return view('client.thank-you');
    }
}
