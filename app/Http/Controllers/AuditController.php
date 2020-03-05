<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\Sarana;
use App\Models\Audit;
use App\Exports\AuditExport;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AuditController extends Controller
{
    #membatasi hak akses ke suatu menu
    public function __construct(){
        $this->middleware(function($request, $next){
            
            if(Gate::allows('manage-audit')) return $next($request);

            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }

    public function index()
    {
        $user = Auth::user()->roles;
        
        if (request()->search) {
            $data = Audit::where('nm_sarana', 'like', '%' . request()->search . '%')->paginate(5);

         } 
        elseif ($user == '["ADMIN"]'){

            $data = Audit::paginate(5);   
        } 
        elseif ($user == '["DIREKTUR"]'){
            
          
            $data = Audit::paginate(5);   
        } 
        else {
            #identifikasi siapa yang login
            $user = Auth::user()->id;
        
            #hanya user yang entri data yang bisa melihat data yang dia entri
            $data = Audit::where('user_id',$user)->paginate(5);
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
            'sarana_id' => 'required',
        ]);

        # query ke anggaran dengan id $audit->id
        $budget = Budget::find(request('budget_id'));
        if(request('biaya') > $budget->pagu) {
            flash('Biaya tidak boleh lebih dari pagu')->error();
            return redirect()->back();
        }
        $user = Auth::user()->id;
       
        # insert into table audit
        $audit = Audit::create([
            'budget_id' => request('budget_id'),
            'surat_tugas' => request('surat_tugas'),
            'sarana_id' => request ('sarana_id'),
            'biaya' => request('biaya'),
            'keterangan' => request('keterangan'),
            'user_id' => $user
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
        $audit = Audit::findOrFail($id);
        $sarana = Sarana::all();
        $budget = Budget::all();

       
        return view('audit.show', compact ('audit','budget','sarana'));
    }

   
    public function edit($id)
    {
        
        $audit = Audit::find($id);
        $sarana = Sarana::all();
        $budget = Budget::all();
       
        return view('audit.edit', compact('audit', 'budget','sarana'));
    }
   
    public function update($id)
    {
        $this->validate(request(), [
            'surat_tugas' => 'required|min:4',
        ]);
        $audit = Audit::find($id);
        

        $audit->update([
            'surat_tugas' => request('surat_tugas'),         
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
