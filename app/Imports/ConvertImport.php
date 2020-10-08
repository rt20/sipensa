<?php

namespace App\Imports;

use App\Models\Convert;
use Maatwebsite\Excel\Concerns\ToModel;

class ConvertImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Convert([
            'nama' => $row[6],
            'invoice' => $row[25],
            'tgl_invoice' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['26']),
            'ski' => $row[3],
            'tgl_ski' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['4']),
        ]);
    }
}
