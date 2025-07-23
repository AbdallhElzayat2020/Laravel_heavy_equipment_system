<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller implements HasMiddleware
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
    protected $redirectTo = '/dashboard/welcome';

    /**
     * Create a new controller instance.
     *
     * @return Middleware[]
     */

    public static function middleware()
    {
        return [
               new Middleware(middleware: 'guest', except: ['logout']),
               new Middleware(middleware: 'auth', only: ['logout']),
        ];
    }
    public function showLoginForm()
    {
        return view('dashboard.auth.login');
    }
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }
        Session::flash('error', __('dashboard.invalid_credentials'));
        return redirect()->route('dashboard.login');
    }
    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('dashboard.categories.index');
    }
    protected function loggedOut(Request $request)
    {
        return redirect()->route('dashboard.login');
    }

}
