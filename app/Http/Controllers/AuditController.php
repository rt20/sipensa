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
use App\Http\Requests\AuditRequest;

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

    public function store(AuditRequest $request)
    {
       
        #mengambil semua data dari formrequest
        $data = $request->all();
        $data['user_id']=auth()->id();
   
        # query ke anggaran dengan id $audit->id
        $budget = Budget::find(request('budget_id'));
        if(request('biaya') > $budget->pagu) {
            flash('Biaya tidak boleh lebih dari pagu')->error();
            return redirect()->back();
        }
        
       $biaya = $request->biaya;

        Audit::create($data);

        # update anggaran
        $budget->update([
            'realisasi' => $budget->realisasi + $biaya,
            'sisa' => $budget->pagu - ($budget->realisasi + $biaya)
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


        return view('audit.edit', compact('audit', 'budget','sarana','subdit','users'));
    }
   
    public function update(AuditRequest $request, $id)
    {
        $data = $request->all();
        
        $audit = Audit::findOrFail($id);
        if (!$audit) return abort(404);

        dd($audit);
        $audit->update($data);
  
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
