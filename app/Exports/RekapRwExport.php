<?php

namespace App\Exports;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class RekapRwExport implements FromCollection, WithHeadings, WithMapping, WithStrictNullComparison
{
    protected $records;

    public function __construct(Collection $records)
    {
        $this->records = $records;
    }

    public function collection()
    {
        return $this->records;
    }

    public function headings(): array
    {
        return ['ID', 'Tgl', 'Peserta', 'SE', 'WA', 'AN', 'GE', 'RA', 'ZR', 'FA', 'WU', 'ME'];
    }

    public function map($row): array
    {
        return [
            $row->user_id,
            Carbon::parse($row->created_at)->format('d-m-Y'),
            $row->name,
            $row->se, $row->wa, $row->an, $row->ge, $row->ra,
            $row->zr, $row->fa, $row->wu, $row->me,
        ];
    }
}
