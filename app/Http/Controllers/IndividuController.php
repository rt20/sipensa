<?php

namespace App\Http\Controllers;

use App\Models\Iku;
use App\Models\Skp;
use App\Models\Stugas_has_user;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class IndividuController extends Controller
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
        $user = Auth::user()->id;
        $stugas = Stugas_has_user::where('user_id',$user)
                ->count();

        if (request()->search) {
            $data = Skp::where('kode', 'like', '%' . request()->search . '%')->paginate(10);
        } else {
            

            $data = Skp::paginate(10);
        }
         return view('kinerja.individu.index', compact('data','stugas'));
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
        //
    }
}
