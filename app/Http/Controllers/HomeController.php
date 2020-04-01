<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sarana;
use App\Models\Audit;
use App\User;

class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function index()
    {
        $sarana = Sarana::count();
        $user = User::count();
        $audit = Audit::count();

        return view('home')->with([
            'sarana' => $sarana,
            'user' => $user,
            'audit' => $audit
        ]);
        
    }
}
