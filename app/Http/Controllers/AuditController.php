<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\Sarana;
use App\Models\Audit;
use App\Models\Capa;
use App\Models\Subdit;
use App\Models\Audit_has_user;
use App\User;
use App\Models\Iku;
use App\Exports\AuditExport;

use DB;
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

            $data = Audit::orderBy('id', 'desc')->paginate(10);  
        } 
        elseif ($user == '["DIREKTUR"]'){
            
          
            $data = Audit::orderBy('id', 'desc')->paginate(10);
        } 
        else {
            #identifikasi siapa yang login
            $user = Auth::user()->id;
        
            #hanya user yang entri data yang bisa melihat data yang dia entri
            $data = Audit::where('user_id',$user)
                            ->orWhere('auditor2',$user)
                            ->orderBy('id', 'desc')
                            ->paginate(10);
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
        // $data = $request->all();

        // Audit::create($data);

        #mengambil semua data dari formrequest kecuali auditor
        $data = new Audit(request([
            'budget_id',
            'surat_tugas',
            'tgl_st',
            'sarana_id',
            'subdit_id',
            'tgl_audit',
            'user_id',
            'auditor3',
            'lokasi',
            'jenis_sarana',
            'jenis_keg',
            'hasil',
            'kesimpulan',
            'rating_produksi',
            'rating_distribusi',
            'biaya',
            'status_capa',
        ]));
        $data->save();
        
        # query ke anggaran dengan id $audit->id
        $budget = Budget::find(request('budget_id'));
        if(request('biaya') > $budget->pagu) {
            flash('Biaya tidak boleh lebih dari pagu')->error();
            return redirect()->back();
        }
        
       $biaya = $request->biaya;

        # update anggaran
        $budget->update([
            'realisasi' => $budget->realisasi + $biaya,
            'sisa' => $budget->pagu - ($budget->realisasi + $biaya)
        ]);
       
        #insert ke tabel capa       
            $user = Auth::user()->id;
            $audit = Audit::latest()->first();
            $check = new capa;
            $check['audit_id'] = $audit->id; # gimana cara memasukkan id audit ke column audit_id?
            $check->user_id = $user;
            $check ['status_capa'] = $audit->status_capa;
            $check->save();
    
        $totalaudit = Audit::count();
        #update tabel kinerja
        $keputusan = Iku::findOrFail(8);
        # update kinerja
        $keputusan->update([
            'realisasi' => ($totalaudit / 4000) * 100
        ]);

        # redirect
        flash('Data has been created successfully')->success();
        return redirect()->route('audit.index');
    }

    
    public function show($id)
    {

    $audit = Audit::findOrFail($id);
    // $auditor = Audit_has_user::where('audit_id', $id)->get();
    // $auditor = Audit::join('audit_has_users', 'audits.id', '=', 'audit_has_users.audit_id')
    // ->join('users','audit_has_users.id_user', '=', 'users.id')
    // ->select('users.name')
    // ->where('audits.id', $id)->pluck('users.name')->toArray();
    // ->get();
    $capa = Capa::where('audit_id', $id)
    ->orderBy('id', 'desc')
    ->get();


    $auditor = Audit::join('users','audits.auditor2','=','users.id')
    ->select('users.name')
    ->where('audits.id', $id)
    ->get();

    $sarana = Sarana::all();
    $budget = Budget::all();
    $subdit = Subdit::all();
    $users = User::all();

    $jenis_keg = Audit::where('id', $id)->pluck('jenis_keg')->toArray();

    return view('audit.show', compact ('audit','budget','sarana','subdit','users','auditor','capa'));
    }
    public function edit($id)
    {
        
        $audit = Audit::findOrFail($id);
     
        $auditor = Audit::join('users','audits.auditor2','=','users.id')
                ->select('users.name')               
                ->where('audits.id', $id)
                ->get();    
              
        $sarana = Sarana::all();
        $budget = Budget::all();
        $subdit = Subdit::all();
        $users = User::all();
       $jenis_keg = Audit::where('id', $id)->pluck('jenis_keg');
      
        return view('audit.edit', compact('audit', 'budget','sarana','subdit','users','auditor' ));
    }
   
    public function update(AuditRequest $request, $id)
    {
        $data = $request->all();

        $item = Audit::findOrFail($id);
        if (!$item) return abort(404);
      
        # query ke anggaran dengan id $audit->id
       $budget = Budget::findOrFail($item->budget_id);

        # cek apakah biaya melebihi pagu ?
        if(request('biaya') > $budget->pagu) {
            flash('Biaya tidak boleh lebih dari pagu')->error();
            return redirect()->back();
        }
        # balikin lagi nilainya
        $budget->update([
            'realisasi' => $budget->realisasi - $item->biaya,
            'sisa' => $budget->sisa + $item->biaya
        ]);
     

        $item->update($data); // ()-> isinya array
        
       $biaya = $request->biaya; // ambil value dari entrian biaya

        # update anggaran
        $budget->update([
            'realisasi' => $budget->realisasi + $biaya,
            'sisa' => $budget->pagu - ($budget->realisasi + $biaya)
        ]);

        #insert ke tabel capa       
        $user = Auth::user()->id;
        $check = new capa;
        $check['audit_id'] = $item->id; # gimana cara memasukkan id audit ke column audit_id?
        $check->user_id = $user;
        $check ['status_capa'] = $item->status_capa;
        $check->save();
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

    public function setStatus (Request $request, $id)
    {
        $request->validate([
            'status_capa' => 'required|in:PENUGASAN,HASIL AUDIT,TINDAK LANJUT,CAPA,EVALUASI,SELESAI'
        ]);

        $item = Audit::findOrFail($id);
        $item->status_capa = $request->status_capa;

        $item->save();
       
        // return redirect()->route('transactions.index');
        flash('Data telah diupdate')->success();
        return redirect()->back(); 
    }



    public function export()
    {
        return Excel::download(new AuditExport, 'audit.xls');
    }
}
