<?php

namespace App\Exports;

use App\Models\Peserta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;

class PesertaExport implements 
    FromCollection,
    ShouldAutoSize,
    WithMapping,
    WithHeadings,
    WithEvents
{
    use Exportable;    
    

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Peserta::all();
    }

    public function map($peserta): array
    {
        return [
            $peserta->id,
            $peserta->email,
            $peserta->nama,
            $peserta->lomba,
            $peserta->no_peserta,
            $peserta->slug,
            $peserta->no_wa,
            $peserta->asal_sekolah,
            $peserta->status,
            $peserta->url,
            $peserta->keterangan,            
            $peserta->file_ktp_suket,
            $peserta->setuju_syarat_ketentuan,
            $peserta->created_at,
            $peserta->updated_at,
        ];
    }

    public function headings(): array 
    {
        return [
            'No',
            'email',
            'nama',
            'lomba',
            'no_peserta',
            'slug',
            'no_wa',
            'asal_sekolah',
            'status',
            'url',
            'keterangan',
            'file_ktp_suket',
            'setuju_syarat_ketentuan',
            'created_at',
            'updated_at'
        ];
    }

    public function registerEvents(): Array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getStyle('A1:N1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ],
                    'borders' => [
                        'top' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                        'rotation' => 90,
                        'startColor' => [
                            'argb' => 'FFA0A0A0',
                        ],
                        'endColor' => [
                            'argb' => 'FFFFFFFF',
                        ],
                    ],
                ]);
            }
        ];
    }
}
