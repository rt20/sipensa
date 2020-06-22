<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\Capa;


use Illuminate\Http\Request;
use App\Http\Requests\CapaRequest;
use Illuminate\Support\Facades\Auth;

class CapaController extends Controller
{
    
    public function index()
    {
        //
    }

   
    public function create()
    {
        
    }

   
    public function store(CapaRequest $request)
    {
        
        $data = $request->all();
dd($data);
        #insert ke tabel capa       
        $user = Auth::user()->id;
        $check = new capa;
       # $check['audit_id'] = $id; # gimana cara memasukkan id audit ke column audit_id?
        $check->user_id = $user;
        // $check ['status_capa'] = $item->status_capa;
        $check->save();

        flash('Data telah diupdate')->success();
        return redirect()->back(); 
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
        //
    }
}
