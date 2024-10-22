<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kegiatan',
        'deskripsi',
        'tanggal',
        'lokasi',
    ];

    public function pengeluarans()
    {
        return $this->hasMany(Pengeluaran::class);
    }
    

}
