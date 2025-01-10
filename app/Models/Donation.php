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
        'phone',
        'donation_amount',
        'donation_message',
        'anonymous',
        'is_verify',
        'snap_token',
    ];

    public function kegiatan()
{
    return $this->belongsTo(Kegiatan::class);
}

}
