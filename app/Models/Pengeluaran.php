<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'kegiatan_id',
        'nama_pengeluaran',
        'jumlah_pengeluaran',
        'tanggal_pengeluaran',
        'keterangan',
    ];

    public function kegiatan()
{
    return $this->belongsTo(Kegiatan::class);
}

}
