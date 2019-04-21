<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('guest')->except('logout');
    }

    public function index(){
        return view('user.login');
    }

    public function login(Request $request){
        $data = $request->only('username', 'password');

        try {
            if (Auth::attempt($data, false))
                return redirect()->route('dashboard');
            else
                return redirect()->route('auth.user');
        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('auth.user');
    }
}
