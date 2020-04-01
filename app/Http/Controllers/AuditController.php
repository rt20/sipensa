<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\Sarana;
use App\Models\Audit;
use App\Exports\AuditExport;
use App\User;
use App\Models\Subdit;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AuditController extends Controller
{
    #membatasi hak akses ke suatu menu
    public function __construct(){
        $this->middleware(function($request, $next){
            
            if(Gate::allows('manage-audit')) return $next($request);

            abort(403, 'Anda tidak memiliki cukup hak akses');

            $user = Auth::user()->roles;
        });
    }

    public function index()
    {
        $user = Auth::user()->roles;
        
        if (request()->search) {
            $data = Audit::where('nm_sarana', 'like', '%' . request()->search . '%')->paginate(10);

         } 
        elseif ($user == '["ADMIN"]'){

            $data = Audit::paginate(10);   
        } 
        elseif ($user == '["DIREKTUR"]'){
            
          
            $data = Audit::paginate(10);   
        } 
        else {
            #identifikasi siapa yang login
            $user = Auth::user()->id;
        
            #hanya user yang entri data yang bisa melihat data yang dia entri
            $data = Audit::where('user_id',$user)->paginate(10);
        }
        
        return view('audit.index', compact('data'));
    }

    
    public function create()
    {
        $budgets = Budget::all();
        $saranas = Sarana::all();
        $subdits = Subdit::all();
        $users = User::all();
        return view('audit.create', compact('budgets','saranas','subdits','users'));
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
            'tgl_st' => request('tgl_st'),
            'sarana_id' => request ('sarana_id'),
            'user_id' => $user,
            'subdit_id' => request ('subdit_id'),
            'tgl_audit' => request('tgl_audit'),
            'auditor1' => request('auditor1'),
            'auditor2' => request('auditor2'),
            'auditor3' => request('auditor3'),
            'lokasi' => request('lokasi'),
            'jenis_sarana' => request('jenis_sarana'),
            'jenis_keg' => request('jenis_keg'),
            'hasil' => request('hasil'),
            'kesimpulan' => request('kesimpulan'),
            'rating_produksi' => request('rating_produksi'),
            'rating_distribusi' => request('rating_distribusi'),
            'biaya' => request('biaya'),
            'keterangan' => request('keterangan')
        ]);
        // dd($audit);
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
        $subdit = Subdit::all();
        $users = User::all();
        // $jenis_keg = array();
        // foreach((array)$audit as $audit){
        //      $jenis_keg[] =  $audit;
        // }
        $jenis_keg = Audit::where('id', $id)->pluck('jenis_keg')->toArray();
      
        return view('audit.show', compact ('audit','budget','sarana','subdit','users'));
    }

   
    public function edit($id)
    {
        
        $audit = Audit::findOrFail($id);
      
        $sarana = Sarana::all();
        $budget = Budget::all();
        $subdit = Subdit::all();
        $users = User::all();
        // $result = Users::where('level','supervisor')->orWhere('level','admin')->whereIn('id',$list)->get()
        // $result = Audit::where('id','jenis_keg')->whereIn('id',$list)->get()
         $jenis_keg = Audit::where('id', $id)->pluck('jenis_keg')->toArray();
     
//   dd($jenis_keg);

        return view('audit.edit', compact('audit', 'budget','sarana','subdit','users'));
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
