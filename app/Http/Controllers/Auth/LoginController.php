<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Alert;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {   
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        $loginType = filter_var($input['email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if(auth()->attempt(array($loginType => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->role == "admin") {
                return redirect()->route('admin');
            }elseif(auth()->user()->role == "kasir"){
                return redirect()->route('kasir');
            }else{
                return redirect()->route('owner');
            }
        }else{
            Alert::error('error','Username atau Email yang anda masukkan salah.');
            return redirect()->route('login');
        }

    }
}
