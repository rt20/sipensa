<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\Sarana;
use App\Models\Audit;
use App\Models\Capa;
use App\Models\Subdit;
use App\Models\Stugas;

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

            $data = DB::table('saranas')
                    ->join('audits','saranas.id','=','audits.sarana_id')
                    ->join('stugas','audits.stugas_id','=','stugas.id')
                   
                  
                    ->select('audits.id','saranas.nama', 'audits.tgl_audit', 'stugas.lokasi','audits.status_capa')
                    ->where('saranas.nama', 'like', '%' . request()->search . '%')
                    ->orderBy('id', 'desc')
                    ->paginate(10);
            // $data = Audit::where('nama', 'like', '%' . request()->search . '%')->paginate(10);

         } 
        elseif ($user == '["ADMIN"]'){

            $data = DB::table('saranas')
                    ->join('audits','saranas.id','=','audits.sarana_id')
                    ->join('stugas','audits.stugas_id','=','stugas.id')
                   
                  
                    ->select('audits.id','saranas.nama', 'audits.tgl_audit', 'stugas.lokasi','audits.status_capa')
                  
                    ->orderBy('id', 'desc')
                    ->paginate(10);
        } 
        elseif ($user == '["DIREKTUR"]'){
            
          
            $data = Audit::orderBy('id', 'desc')->paginate(10);
        } 
        else {
          
            $userlogin = Auth::user()->id;

            $data = DB::table('saranas')
                    ->join('audits','saranas.id','=','audits.sarana_id')
                    ->join('stugas','audits.stugas_id','=','stugas.id')
                    ->join('stugas_has_users','stugas.id','=','stugas_has_users.stugas_id')
                    ->join('users','stugas_has_users.user_id','=','users.id')
                    ->select('audits.id','saranas.nama', 'audits.tgl_audit', 'stugas.lokasi','stugas_has_users.stugas_id','audits.status_capa')
                    ->where('stugas_has_users.user_id', $userlogin)
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
        $userlogin = Auth::user()->id;
        $stugas = Stugas::join('stugas_has_users','stugas.id','=','stugas_has_users.stugas_id')
                ->select('stugas.id','stugas.no_st','stugas.tgl_st','stugas.lokasi')
                ->where('stugas_has_users.user_id', $userlogin)
                ->orderBy('id', 'desc')
                ->get();

        return view('audit.create', compact('budgets','saranas','subdits','users','stugas'));
    }

    public function store(AuditRequest $request)
    {

        #mengambil semua data dari formrequest kecuali auditor
        $data = new Audit(request([
            'stugas_id',
            'sarana_id',
            'subdit_id',
            'tgl_audit',
            'user_id',
            'alamat',
            'tambahan',
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
    $capa = Capa::where('audit_id', $id)
    ->orderBy('id', 'desc')
    ->get();
    $stugas = Stugas::all();
    $sarana = Sarana::all();
    $budget = Budget::all();
    $subdit = Subdit::all();
    $users = User::all();

    $jenis_keg = Audit::where('id', $id)->pluck('jenis_keg')->toArray();

    return view('audit.show', compact ('audit','budget','sarana','subdit','users','capa','stugas'));
    }
    public function edit($id)
    {    
        $audit = Audit::findOrFail($id);       
       
        $sarana = Sarana::all();
        $users = User::all();
        $userlogin = Auth::user()->id;
        $stugas = Stugas::all();
       
        return view('audit.edit', compact('audit', 'sarana','users','stugas'));
    }
   
    public function update(AuditRequest $request, $id)
    {
        $data = $request->all();
 
        $item = Audit::findOrFail($id);
        if (!$item) return abort(404);
        $item->update($data); // ()-> isinya array
       
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
       
        $audit->delete();
        flash('Data berhasil dihapus')->error();
        return redirect()->route('audit.index');
    }

    public function setStatus (Request $request, $id)
    {
        $request->validate([
            'status_capa' => 'required'
        ]);

        $item = Audit::findOrFail($id);
        $item->status_capa = $request->status_capa;

        $item->save();

        if ($request->status_capa == '["Ditugaskan melakukan audit"]'){

            $kegiatan = 'ditugaskan melakukan audit';  
        } 
        elseif ($request->status_capa == '["Telah melaksanakan audit"]'){

            $kegiatan = 'membuat laporan audit sarana';  
        } 
        else {
            $kegiatan = 'menyelesaikan audit';
         #insert ke tabel capa       
         $user = Auth::user()->id;
         $check = new capa;
         $check['audit_id'] = $item->id; # gimana cara memasukkan id audit ke column audit_id?
         $check->user_id = $user;
         $check ['status_capa'] = $item->status_capa;
         $check['kegiatan'] = $kegiatan;
         $check->deskripsi = $request->deskripsi;

         $check->save();
        }
        // return redirect()->route('transactions.index');
        flash('Data telah diupdate')->success();
        return redirect()->back(); 
    }

    
    public function export()
    {
        return Excel::download(new AuditExport, 'audit.xls');
    }

}
