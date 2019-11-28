<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginSocial(Request $request){
        $this->validate($request, [
           'social_type' => 'required|in:github,google'
        ]);
        $socialType = $request->input('social_type');
        return \Socialite::with($socialType)->redirect();
    }

    public function loginCallback(){
        $userSocial = \Socialite::driver('github')->stateless()->user();
        $user = User::where('email', $userSocial->email)->first();
        if (!$user){
            $user = User::create([
                'name' => $userSocial->name ?? $userSocial->nickname,
                'email' => $userSocial->email,
                'password'=> bcrypt(''),
                'whatsapp' => ''
            ]);
        }
        Auth::login($user);
        return redirect()->intended($this->redirectTo);
    }
}
