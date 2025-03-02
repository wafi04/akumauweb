<?php

namespace App\Exports;

use App\Models\Pembelian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class PembelianExport implements FromCollection, WithHeadings, WithMapping
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
        return Pembelian::whereBetween('created_at', [new Carbon($this->startDate), new Carbon($this->endDate)])
                        ->where('status', 'Success')
                        ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Order ID',
            'User ID',
            'layanan',
            'Harga',
            'Status',
            'Created At',
            'Updated At'
        ];
    }

    public function map($pembelian): array
    {
        return [
            $pembelian->id,
            $pembelian->order_id,
            $pembelian->user_id,
            $pembelian->layanan,
            $pembelian->harga,
            $pembelian->status,
            $pembelian->created_at,
            $pembelian->updated_at,
        ];
    }
}
