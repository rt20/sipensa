<?php

namespace App\Exports;

use App\Models\Convert;
use App\Models\Insw;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;

class ConvertsExport implements FromCollection
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
}
