<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    
    public function index()
    {
        if (request()->search) {
            $data = User::where('name', 'like', '%' . request()->search . '%')->paginate(10);
        } else {
            $data = User::paginate(5);
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
        
       
        return view('user.edit', compact('user'));
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
