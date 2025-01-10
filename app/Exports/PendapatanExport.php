<?php
namespace App\Exports;

use App\Models\Donation;
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
        return Donation::whereBetween('tanggal_pengeluaran', [$this->startDate, $this->endDate])
            ->select('id', 'nama', 'email', 'phone', 'donation_amount')
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID', 'Nama', 'Email', 'Phone', 'Donasi'
        ];
    }
}

