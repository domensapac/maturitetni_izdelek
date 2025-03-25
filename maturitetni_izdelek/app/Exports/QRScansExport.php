<?php

namespace App\Exports;

use App\Models\QRScan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class QRScansExport implements FromCollection
{
    public function collection()
    {
        return QRScan::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'User ID',
            'Scanned at',
            'Created at',
            'Updated at'
        ];
    }

    public function map($qrScan): array
    {
        return [
            $qrScan->id,
            $qrScan->user_id,
            $qrScan->scanned_at,
            $qrScan->created_at,
            $qrScan->updated_at
        ];
    }
}
