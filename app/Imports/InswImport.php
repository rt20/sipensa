<?php

namespace App\Imports;

use App\Models\Insw;
use Maatwebsite\Excel\Concerns\ToModel;

class InswImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Insw([
            'nama' => $row[19],
            'no_pib' => $row[4],
            'tgl_pib' => $row[5],
            'tgl_sppb' => $row[6],
            'invoice' => $row[2],
            'tgl_invoice' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['3']),
            'ski' => $row[16],
            'tgl_ski' => $row[17],
        ]);
    }
}
