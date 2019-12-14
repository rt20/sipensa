<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\Sarana;
use App\Models\Audit;
use App\Exports\AuditExport;


class AuditController extends Controller
{
    
    public function index()
    {
        if (request()->search) {
            $data = Audit::where('nm_sarana', 'like', '%' . request()->search . '%')->paginate(10);
        } else {
            $data = Audit::paginate(10);
        }
        return view('audit.index', compact('data'));
    }

    
    public function create()
    {
        $budgets = Budget::all();
        $saranas = Sarana::all();
        
        return view('audit.create', compact('budgets','saranas'));
    }

    public function store()
    {
        # validasi form input
        $this->validate(request(), [
            'budget_id' => 'required',
            'surat_tugas' => 'required|min:4',
            'nm_sarana' => 'required',
        ]);

        # query ke anggaran dengan id $audit->id
        $budget = Budget::find(request('budget_id'));
        if(request('biaya') > $budget->pagu) {
            flash('Biaya tidak boleh lebih dari pagu')->error();
            return redirect()->back();
        }
        
        # insert into table audit
        $audit = Audit::create([
            'budget_id' => request('budget_id'),
            'surat_tugas' => request('surat_tugas'),
            'nm_sarana' => request ('nm_sarana'),
            'biaya' => request('biaya'),
            'keterangan' => request('keterangan'),
        ]);
        # update anggaran
        $budget->update([
            'realisasi' => $budget->realisasi + $audit->biaya,
            'sisa' => $budget->pagu - ($budget->realisasi + $audit->biaya)
        ]);

        # redirect
        flash('Data has been created successfully')->success();
        return redirect()->route('audit.index');
    }

    
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $audit = Audit::find($id);
        $budget = Budget::all();
       
        return view('audit.edit', compact('audit', 'budget'));
    }
   
    public function update($id)
    {
        $this->validate(request(), [
            'nm_sarana' => 'required|min:4',
        ]);
        $audit = Audit::find($id);
        
        $audit->update([
            'surat_tugas' => request('surat_tugas'),
            'nm_sarana' => request('nm_sarana'),
            'keterangan' => request('keterangan')
        ]);
        

        flash('Data telah diupdate')->success();
        return redirect()->route('audit.index');
    }

    
    public function destroy($id)
    {
        $audit = Audit::find($id);
        $budget = Budget::find($audit->budget_id);
        # balikin lagi nilainya
        $budget->update([
            'realisasi' => $budget->realisasi - $audit->biaya,
            'sisa' => $budget->sisa + $audit->biaya
        ]);
        $audit->delete();
        flash('Data berhasil dihapus')->error();
        return redirect()->route('audit.index');
    }

    public function export()
    {
        return Excel::download(new AuditExport, 'audit.xls');
    }
}
