<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Subdit;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware(function($request, $next){
            
            if(Gate::allows('manage-users')) return $next($request);

            abort(403, 'Anda tidak memiliki cukup hak akses');

            
        });
    }

    public function index()
    {
 




        
        if (request()->search) {
            $data = User::where('name', 'like', '%' . request()->search . '%')->paginate(10);
        } else {
            // $data = User::paginate(10);
                #identifikasi siapa yang login
                $user = Auth::user()->id;
                        
                #hanya user yang entri data yang bisa melihat data yang dia entri
                $data = User::where('id',$user)->paginate(10);

        }
        return view('user.index', compact('data'));
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
        $user = User::find($id);
        $subdit = Subdit::all();
      
        return view('user.edit', compact('user', 'subdit'));
    }

    
    public function update($id)
    {
        $this->validate(request(), [
            'name' => 'required|min:4',
            'nip' => 'required|numeric',
            'jabatan' => 'required|min:4',
            'email' => 'required|email',
        ]);
        $user = User::find($id);
        
        $user->update([
            'name' => request('name'),
            'nip' => request('nip'),
            'jabatan' => request('jabatan'),
            'subdit_id' => request('subdit_id'),
            'email' => request('email')
        ]);
        flash('Data telah diupdate')->success();
        return redirect()->route('user.index');
    }

    
    public function destroy($id)
    {
        //
    }
}
