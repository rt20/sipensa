<?php

namespace App\Imports;

use App\Budget;
use Maatwebsite\Excel\Concerns\ToModel;

class BudgetImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Budget([
            'kode' => $row[1],
            'uraian' => $row[2],
            'pagu' => $row[3],
            'realisasi' => $row[4],
            'sisa' => $row[5],
            'keterangan' => $row[6],
        ]);
    }
}
