<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');

        
    }

   
    public function index()
    {
        // if(!auth()->user()->hasRole('admin')){
        //     abort(404);
        // }

        return view('home');
        
    }
}
