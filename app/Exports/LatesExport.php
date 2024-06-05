<?php

namespace App\Exports;

use App\Models\Late;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LatesExport implements FromCollection, WithHeadings, WithMapping
{
    protected $latesData;

    public function __construct($latesData)
    {
        $this->latesData = $latesData;
    }

    public function collection()
    {
        return $this->latesData;
    }

    public function headings(): array
    {
        return [
            'Nama Siswa',
            'NIS',
            'Rombel',
            'Rayon',
            'Jumlah Keterlambatan',
        ];
    }

    public function map($late): array
    {
        return [
            'Nama Siswa' => $late->name,
            'NIS' => optional($late->student)->nis ?? 'N/A',
            'Rombel' => optional($late->student->rombel)->rombel ?? 'N/A',
            'Rayon' => optional($late->student->rayon)->rayon ?? 'N/A',
            'Jumlah Keterlambatan' => $late->jumlah_keterlambatan,
        ];
    }
}
