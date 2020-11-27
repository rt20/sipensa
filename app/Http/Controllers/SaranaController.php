<?php

namespace App\Http\Controllers;

use App\Models\Sarana;
use App\Http\Requests\SaranaRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SaranaController extends Controller
{
    #membatasi hak akses ke suatu menu 
    public function __construct(){
        $this->middleware(function($request, $next){
            
            if(Gate::allows('manage-sarana')) return $next($request);

            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }
 
    public function index()
    {
        if (request()->search) {
            $data = Sarana::where('nama', 'like', '%' . request()->search . '%')->paginate(10);
        } else {
            $data = Sarana::orderBy('id', 'desc')->paginate(10);
        }
         return view('sarana.index', compact('data'));
    }

   
    public function create()
    {
        return view('sarana.create');
    }

   
    public function store()
    {
        # validasi form input
        $this->validate(request(), [
            'nama' => 'required|min:4',

        ]);

          # Insert ke database
     
        $data = Sarana::create([
            'nama' => request('nama'),
            'jenis' => request('jenis'),
            'telepon' => request('telepon'),
            'alamat_kantor' => request('alamat_kantor'),
            'alamat_sarana' => request('alamat_sarana'),
            'nama_pangan' => request('nama_pangan'),
            'merk' => request('merk'),
            'penanggungjawab' => request('penanggungjawab'),
            'keterangan' => request('keterangan'),
        ]);
      
         # Tampilin flash message
         flash('Selamat data telah berhasil ditambahkan')->success();

         # Kalo udah insert data, redirect ke halaman anggaran
         return redirect()->route('sarana.index');
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
    public function edit($coba)
    {
        # Query database
        # select * from anggarans where id = $param
        $sarana= Sarana::find($coba);
        if (!$sarana) return abort(404);
        return view('sarana.edit', compact('sarana'));
    }

    
    public function update(SaranaRequest $request, $coba)
    {
        $data = $request->all();
       
       # query database dengan id sekian
       $row = Sarana::findOrFail($coba);
       if (!$row) return abort(404);
 
       # update data
       $row->update($data);
    
        # Tampilin flash message
        flash('Selamat data telah berhasil di update')->success();
        # Kalo udah insert data, redirect ke halaman anggaran
        return redirect()->route('sarana.index');
    }

    
    public function destroy($coba)
    {
        # query database dengan id sekian
        $row = Sarana::find($coba);
        if (!$row) return abort(404);
        $row->delete();
        # Tampilin flash message
        flash('Data telah berhasil dihapus')->error();
        # Kalo udah insert data, redirect ke halaman anggaran
        return redirect()->route('sarana.index');
    }
    public function addsarana()
    {
       
        return view('sarana.addsarana');
    }
    public function storeAddsarana (Request $request)
    {
        $data = Sarana::create([
            'nama' => request('nama'),          
            'telepon' => request('telepon'),
            'penanggungjawab' => request('penanggungjawab'),
            'keterangan' => request('keterangan'),
        ]);

         return response()->json([
            'bool'=>true
        ]);
    }
    public function loadData(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            // $data = DB::table('saranas')->select('id', 'nama')->where('nama', 'LIKE', '%$cari%')->get();
            $data = Sarana::where('nama', 'like', '%' . request()->q . '%')->get();
            return response()->json($data);
        }
    }
}
