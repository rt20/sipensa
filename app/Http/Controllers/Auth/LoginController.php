<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    

    use AuthenticatesUsers;

   
    protected $redirectTo = '/home';

    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    #dari laraboi
    public function username()
    {
        return 'login';
       
    }
    protected function sendLoginResponse(User $user, Request $request)
    {
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);
        Auth::login($user, $request->has('remember'));
        return redirect()->route('home');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'login' => 'required|min:2|max:30',
            'password' => 'required|min:6|max:20'
        ]);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        $login = $request->input('login');
        $loginIsEmail = filter_var($login, FILTER_VALIDATE_EMAIL);
        $user = User::where($loginIsEmail ? 'email' : 'nip', $login)->first(); #->where('active', true)->first();

        if (!$user) {
            flash('NIP tidak ditemukan di database!')->error();
           return redirect('/login');
           
        }

        if (Hash::check($request->input('password'), $user->password)) {
            $user->last_login = Carbon::now()->toDateTimeString();
            $user->save();
            return $this->sendLoginResponse($user, $request);
        }

        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }
}
