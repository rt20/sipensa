<?php

namespace App\Http\Controllers;

use App\Imports\ConvertImport;
use App\Imports\InswImport;
use App\Models\Convert;
use App\Models\Insw;
use App\Exports\ConvertsExport;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ConvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->roles;

       
      
        return view('convert.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $insw = Insw::all();
        $convert = Convert::all();
        $insw->delete();
        $convert->delete();
        flash('Data berhasil dihapus')->error();
        return redirect()->route('convert.index');
    }
    public function import()
    {
        Convert::truncate();
        Insw::truncate();
        
        Excel::import(new ConvertImport, request()->file('ebpom'));
        Excel::import(new InswImport, request()->file('insw'));

        flash('Data telah diunggah')->success();
        return redirect()->route('convert.index');
    }
    public function export()
    {
        
        return Excel::download(new ConvertsExport, 'ski.xls');
    }
}
