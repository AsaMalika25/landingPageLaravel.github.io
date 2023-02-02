<?php

namespace App\Exports;

use App\Models\prestasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return prestasi::select("id", "judul")->get();
    }
    public function columnWidths(): array
    {
        return [
            'A' => 55,
            'B' => 200,            
        ];
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('B1')->getFont()->setBold(true);
        $sheet->getStyle('B')->getFont()->setBold(true);
    }

}
