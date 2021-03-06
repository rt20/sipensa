<?php

namespace App\Http\Controllers;

use App\Exports\BudgetExport;
use App\Imports\BudgetImport;
use App\Models\Budget;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Crypt;




class BudgetController extends Controller
{
    #membatasi hak akses ke suatu menu
    public function __construct(){
        $this->middleware(function($request, $next){
            
            if(Gate::allows('manage-budgets')) return $next($request);

            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }
    # Tugasnya nampilin data di table
    public function index()
    {
        if (request()->search) {
            $data = Budget::where('kode', 'like', '%' . request()->search . '%')->paginate(10);
        } else {
            $data = Budget::paginate(10);
        }

         return view('budget.index', compact('data'));
    }

    # Tugasnya cuma nampilin form
    public function create()
    {
        return view('budget.create');
    }

   
    public function store()
    {
        # validasi form input
        $this->validate(request(), [
            'kode' => 'required|min:4',
            'uraian' => 'required|min:4',
            'pagu' => 'required|numeric',  
        ]);
        

         # Insert ke database
        # insert into anggaran blablabla
        Budget::create([
            'kode' => request('kode'),
            'uraian' => request('uraian'),
            'pagu' => request('pagu'),
            'realisasi' => request('realisasi'),
            'sisa' => request('sisa'),
            'keterangan' => request('keterangan'),
        ]);
       
        # Tampilin flash message
        flash('Selamat data telah berhasil di buat')->success();

        # Kalo udah insert data, redirect ke halaman anggaran
        return redirect()->route('budget.index');
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
    public function edit($param)
    {
        # Query database
        # select * from anggarans where id = $param
        $budget = Budget::find($param);
        if (!$budget) return abort(404);
        
        return view('budget.edit', compact('budget'));
    }

    
    public function update($param)
    {
        # query database dengan id sekian
        $row = Budget::find($param);
        if (!$row) return abort(404);

        # update data 
        $row->update([
            // 'kode' => request('kode'),
            // 'uraian' => request('uraian'),
            'pagu' => request('pagu'),
            // 'realisasi' => request('realisasi'),
            // 'sisa' => request('pagu'),
            'keterangan' => request('keterangan'),
        ]);
        
        # Tampilin flash message
        flash('Selamat data telah berhasil di update')->success();
        # Kalo udah insert data, redirect ke halaman anggaran
        return redirect()->route('budget.index');

    }

    
    public function destroy($param)
    {
        # query database dengan id sekian
        $row = Budget::find($param);
        if (!$row) return abort(404);
        $row->delete();
        # Tampilin flash message
        flash('Data telah berhasil di delete')->error();
        # Kalo udah insert data, redirect ke halaman anggaran
        return redirect()->route('budget.index');
    }

    public function export()
    {
        
        return Excel::download(new BudgetExport, 'anggaran.xlsx');
        # return redirect()->route('budget.index'); --> tidak bisa return, i dont know how to solve
    }
    public function import()
    {
        Excel::import(new BudgetImport, request()->file('file'));

        flash('Success all good!')->success();
        return redirect()->route('budget.index');
    }

}
