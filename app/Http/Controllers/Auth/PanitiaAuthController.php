<?php

namespace App\Http\Controllers\Auth;

use App\Panitia;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class PanitiaAuthController extends Controller
{
    use AuthenticatesUsers;

    protected $maxAttempts = 3;
    protected $decayMinutes = 2;

    public function __construct()
    {
        $this->middleware('guest:panitia')->except('postLogout');
    }

    public function getLogin()
    {
        return view('auth.admin.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if (auth()->guard('panitia')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
            return redirect()->route('panitia.home');
            return view('panitia.dashboard');
        } else {
            $this->incrementLoginAttempts($request);

            return redirect()
                ->back()
                ->withInput()
                ->withErrors(["Incorrect user login details!"]);
        }
        return view('panitia.dashboard');
    }

    public function postLogout()
    {
        auth()->guard('panitia')->logout();
        session()->flush();

        return redirect()->route('panitia.login');
    }
}
