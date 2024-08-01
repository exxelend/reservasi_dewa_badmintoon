<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // Menggunakan Illuminate\Http\Request untuk mengakses Request
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticating(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user_role = Auth::user()->role;
            if ($user_role == 'admin') {
                return redirect()->route('dashboard_admin');
            } else if ($user_role == 'user') {
                return redirect()->route('dashboard');
            } else if ($user_role == 'owner') {
                return redirect()->route('owner.dashboard');
            } else if ($user_role == 'petugas') {
                return redirect()->route('petugas.dashboard');
            } else if ($user_role == 'kasir') {
                return redirect()->route('kasir.dashboard');
            } else {
                return redirect()->route('home'); // Atur route default sesuai kebutuhan Anda
            }
        }

        return redirect()->back()->withInput($request->only('email')); // Redirect kembali dengan input email jika login gagal
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}