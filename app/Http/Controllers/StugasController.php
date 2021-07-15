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
use App\Models\Stugas_has_user;
use App\User;
use App\Models\Iku;
use App\Exports\AuditExport;

use DB;
use App\Http\Requests\StugasRequest;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class StugasController extends Controller
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
            $data = Stugas::where('no_st', 'like', '%' . request()->search . '%')->paginate(10);

         } 
        elseif ($user == '["ADMIN"]'){

            $data = Stugas::orderBy('id', 'desc')->paginate(10);  
        } 
        elseif ($user == '["DIREKTUR"]'){
            
          
            $data = Stugas::orderBy('id', 'desc')->paginate(10);
        } 
        else {
            #identifikasi siapa yang login
            $user = Auth::user()->id;
        
            #hanya user yang entri data yang bisa melihat data yang dia entri
            #$data = Stugas::where('user_id',$user)->paginate(10);    
                          
           

            $data = Stugas::join('stugas_has_users','stugas.id','=','stugas_has_users.stugas_id')
            ->select('stugas.id','stugas.no_st','stugas.tgl_st','stugas.lokasi','stugas.biaya')
            ->where('stugas_has_users.user_id', $user)
            ->orderBy('id', 'desc')
            ->paginate(10);
                   
        }
       
        return view('stugas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $budgets = Budget::all();
        
        $subdits = Subdit::all();
        $users = User::all();
        return view('stugas.create', compact('budgets','subdits','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StugasRequest $request)
    {
        
        $data = new Stugas(request([
            'no_st',
            'tgl_st',
            'tgl_audit',
            'budget_id',
            'tambahan' ,
            'subdit_id',
            'lokasi',
        ]));
        $data->save();
        

         #insert ke tabel stugas_has_user
         foreach($request->user_id as $user_id){
            $stugas = Stugas::latest()->first();
            $check = new stugas_has_user;
            $check['stugas_id'] = $stugas->id; # gimana cara memasukkan id stugas ke column stugas_id?
            $check->user_id = $user_id;
            $check->save();

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
        
        }
        return redirect()->route('stugas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $stugas = Stugas::findOrFail($id);
        $budget = Budget::all();
        $subdit = Subdit::all();
        $users = User::join('stugas_has_users','users.id','=','stugas_has_users.user_id')
                ->select('users.name')
                ->where('stugas_has_users.stugas_id', $id)
                ->get();
     
        return view('stugas.edit', compact( 'budget','subdit','users','stugas' ));
    }

    
    public function update(StugasRequest $request, $id)
    {
        $data = $request->all();

        $item = Stugas::findOrFail($id);
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

       
        flash('Data telah diupdate')->success();
        return redirect()->route('stugas.index');
    }

   
    public function destroy($id)
    {
        $stugas = Stugas::find($id);
        

        $stugas->delete();

        flash('Data berhasil dihapus')->error();
        return redirect()->route('stugas.index');
    }
    public function addstugas()
    {
        $budgets = Budget::all();
        
        $subdits = Subdit::all();
        $users = User::all();
        return view('stugas.addstugas', compact('budgets','subdits','users'));
    }
    public function storeAddstugas (Request $request)
    { 
        $data = Stugas::create([
            'no_st' => request('no_st'),
            'tgl_st' => request('tgl_st'),
            'tgl_audit' => request('tgl_audit'),
            'budget_id' => request('budget_id'),
            'tambahan'  => request('tambahan'),
            'subdit_id' => request('subdit_id'),
            'lokasi' => request('lokasi'),
            'biaya' => request('biaya'),
        ]);

        #insert ke tabel stugas_has_user
        foreach($request->user_id as $user_id){
            $stugas = Stugas::latest()->first();
            $check = new stugas_has_user;
            $check['stugas_id'] = $stugas->id; # gimana cara memasukkan id stugas ke column stugas_id?
            $check->user_id = $user_id;
            $check->save();

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
        }
        // return response()->json([
        //     'bool'=>true
        // ]);
        return response()->json($data);
    }
    public function loadData(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = Stugas::where('no_st', 'like', '%' . request()->q . '%')->get();
            return response()->json($data);
        }
    }
}
