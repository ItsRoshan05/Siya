<?php
namespace App\Exports;

use App\Models\Pengeluaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengeluaranExport implements FromCollection, WithHeadings
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        return Pengeluaran::whereBetween('tanggal_pengeluaran', [$this->startDate, $this->endDate])->get();
    }

    public function headings(): array
    {
        return [
            'ID', 'Nama Pengeluaran', 'Jumlah Pengeluaran', 'Tanggal Pengeluaran', 'Keterangan'
        ];
    }
}
