<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    // Tentukan atribut yang dapat diisi (mass assignable)
    protected $fillable = [
        'nama',
        'email',
        'donation_amount',
        'donation_type',
        'donation_message',
        'anonymous',
        'is_verify',
        'payment_proof',
    ];

    public function kegiatan()
{
    return $this->belongsTo(Kegiatan::class);
}

}
