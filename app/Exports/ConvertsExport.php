<?php

namespace App\Exports;

use App\Models\Convert;
use App\Models\Insw;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Illuminate\Support\Facades\Auth;

class ConvertsExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Convert::join('insws','converts.nama','=','insws.nama')
        ->select('converts.nama','insws.no_pib','insws.tgl_pib','insws.tgl_sppb','converts.invoice','converts.tgl_invoice','converts.ski','converts.tgl_ski')
        ->get();
    }
    public function headings():array
    {
        return [
            'Nama Perusahaan',
            'Nomor PIB',
            'Tanggal PIB',
            'Tanggal SPPB',
            'Invoice',
            'Tanggal Invoice',
            'Nomor SKI',
            'Tanggal SKI',
        ];
    }
}
