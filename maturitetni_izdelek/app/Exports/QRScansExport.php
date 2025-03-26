<?php

namespace App\Exports;

use App\Models\QRScan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class QRScansExport implements FromCollection, WithHeadings, WithMapping
{
    public function __construct($month = null, $year = null)
    {
        $this->month = $month;
        $this->year = $year;
    }

    // Fetch filtered data
    public function collection()
    {
        $query = QRScan::query();

        // Apply month and year filters
        if ($this->month && $this->year) {
            $query->whereMonth('scanned_at', $this->month)
                  ->whereYear('scanned_at', $this->year);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'User',
            'Scanned',
            'Created',
            'Updated'
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
