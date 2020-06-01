<?php

namespace App\Exports;

use App\Models\Sarana;
use App\Models\Subdit;
use App\Models\Audit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;

class AuditExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user = Auth::user()->id;
        
        return Audit::join('users', 'audits.user_id', '=',  'users.id')
            ->join('saranas','audits.sarana_id', '=',  'saranas.id')
            ->select('audits.surat_tugas','audits.tgl_st','saranas.nama','audits.lokasi','audits.tgl_audit','audits.jenis_sarana','audits.jenis_keg','audits.hasil','audits.rating_produksi','audits.rating_distribusi', 'audits.biaya', 'audits.keterangan', 'audits.kesimpulan','users.name')
            ->where('audits.user_id', $user)
            ->orderBy('audits.id', 'desc')
            ->get();
    }
}