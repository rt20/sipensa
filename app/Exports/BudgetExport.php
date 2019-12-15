<?php

namespace App\Exports;

use App\Models\Budget;
use Maatwebsite\Excel\Concerns\FromCollection;

class BudgetExport implements FromCollection
{
    
    public function collection()
    {
       
        return Budget::all();
    }
}
