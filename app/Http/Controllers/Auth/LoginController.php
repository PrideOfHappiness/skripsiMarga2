<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $input = $request->all();

        $this->validate($request, [
            'kode_karyawan' => 'required',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('kode_karyawan' => $input['kode_karyawan'],
            'password' => $input['password']))){
                if(auth()->user()->status == 'karyawan'){
                    return redirect()->route('karyawan.home');
                } else if(auth()->user()->status == 'admin'){
                    return redirect()->route('admin.home');
                } else if(auth()->user()->status == 'pemilik'){
                    return redirect()->route('pemilik.home');
                } 
                } else{
                    return redirect()->route('login')
                        ->with('error','Email-Address And Password Are Wrong.');
                }
            }
    }
