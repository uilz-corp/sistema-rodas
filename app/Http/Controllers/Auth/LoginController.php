<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Validators\LoginValidator;

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
        return view('login');
    }

    public function login(Request $request){
        $data = $request->only('cpf', 'password');
        $data['cpf'] = str_replace(['.','-'], '', $data['cpf']);

        (new LoginValidator)->cpf($request);


        try {
            if (Auth::attempt($data))
                return redirect()->intended('dashboard');
            else
                return response()->json([
                    'message' => 'Senha incorreta.'
                ], 400);
        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('auth.user');
    }
}
