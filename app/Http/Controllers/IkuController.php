<?php

namespace App\Http\Controllers;

use App\Models\Iku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class IkuController extends Controller
{
    #membatasi hak akses ke suatu menu
    public function __construct(){
        $this->middleware(function($request, $next){
            
            if(Gate::allows('manage-indikator')) return $next($request);

            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }
    
    public function index()
    {
        if (request()->search) {
            $data = Iku::where('kode', 'like', '%' . request()->search . '%')->paginate(10);
        } else {
            $data = Iku::paginate(10);
        }
         return view('iku.index', compact('data'));
    }

    
    public function create()
    {
        return view('iku.create');
    }

   
    public function store()
    {
        # validasi form input
        $this->validate(request(), [
            'kode' => 'required|min:4',
            'sasaran' => 'required|min:4',
            'target' => 'required|numeric',  
        ]);
        # Insert ke database
        # insert into anggaran blablabla
        Iku::create([
            'kode' => request('kode'),
            'sasaran' => request('sasaran'),
            'target' => request('target'),
            'realisasi' => request('realisasi'),
            'keterangan' => request('keterangan'),
        ]);
     # Tampilin flash message
     flash('Selamat data telah berhasil di buat')->success();

     # Kalo udah insert data, redirect ke halaman anggaran
     return redirect()->route('iku.index');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($rumah)
    {
        # Query database
        # select * from anggarans where id = $param
        $iku = Iku::find($rumah);
        if (!$iku) return abort(404);
        return view('iku.edit', compact('iku'));
    }

    
    public function update($request)
    {
        # query database dengan id sekian
        $row = Iku::find($request);
        if (!$row) return abort(404);

        # update data
        $row->update([
            'kode' => request('kode'),
            'sasaran' => request('sasaran'),
            'target' => request('target'),
            'realisasi' => request('realisasi'),
            'keterangan' => request('keterangan'),
        ]);
      # Tampilin flash message
      flash('Selamat data telah berhasil di update')->success();
      # Kalo udah insert data, redirect ke halaman anggaran
      return redirect()->route('iku.index');
    }

   
    public function destroy($id)
    {
         # query database dengan id sekian
         $row = Iku::find($id);
         if (!$row) return abort(404);
         $row->delete();
         # Tampilin flash message
         flash('Data telah berhasil di delete')->error();
         # Kalo udah insert data, redirect ke halaman anggaran
         return redirect()->route('iku.index');
    }
}
