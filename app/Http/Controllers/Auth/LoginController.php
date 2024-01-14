<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
    protected function authenticated(Request $request, $user)
    {
        // Verifică tipul utilizatorului înainte de autentificare
        if ($user->type_utilizator !== $request->input('type_utilizator')) {
            Auth::logout();
            return redirect('/login')->with('error', 'Tipul de utilizator nu corespunde.');
        }

        // Redirectează în funcție de tipul de utilizator
        if ($user->type_utilizator === 'cititor') {
            return redirect()->route('sites.list');
        }

        return redirect()->intended($this->redirectPath());
    }
}