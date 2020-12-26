<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function google(){
        return Socialite::driver('google')->redirect();
    }
    public function redirect_google(){
        $user = Socialite::driver('google')->stateless()->user();
        $user = User::firstOrCreate([
            'email' => $user->email
        ],[
            'email' => $user->email,
            'name' => $user->name?$user->name:$user->nickname,
        ]);
        Auth::login($user, true);
        return redirect()->route('home');
    }
    public function facebook(){
        return Socialite::driver('facebook')->redirect();
    }
    public function redirect_facebook(){
        $user = Socialite::driver('facebook')->stateless()->user();
        $user = User::firstOrCreate([
            'email' => $user->email
        ],[
            'email' => $user->email,
            'name' => $user->name?$user->name:$user->nickname,
        ]);
        Auth::login($user, true);
        return redirect()->route('home');
    }
}
