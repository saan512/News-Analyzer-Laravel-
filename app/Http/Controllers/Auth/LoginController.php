<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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
    public function redirectTo()
    {
        if (auth()->user()->role == 1) {
            return '/admin.dashboard';
        } elseif ( auth()->user()->role == 2){
            return '/user.dashboard';
        }
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
    public function login(Request $request){
        $input = $request->all();
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);
 
        if( auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password'])) ){
 
         if( auth()->user()->role == 1 ){
             return redirect()->route('admin.dashboard');
         }
         elseif( auth()->user()->role == 2 ){
            //  return redirect()->route('user.dashboard');
             return redirect()->route('home');
         }
 
        }else{
            toastr()->error('Email and password are wrong');
            return redirect()->route('login');
        }
     }
}
