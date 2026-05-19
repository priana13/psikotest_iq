<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {      

        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
            'captcha' => 'required|captcha'
        ]);
    }

    /**
     * Ganti field login dari 'email' ke 'login'
     */
    public function username()
    {
        return 'login';
    }


    /**
     * Cek apakah input adalah email atau username,
     * lalu sesuaikan kolom yang dicari di database.
     */
    protected function credentials(Request $request)
    {
        $login = $request->input('login');

        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        return [
            $field     => $login,
            'password' => $request->input('password'),
            'status'   => 'Aktif'
        ];
    }



    /**
     * Override redirect berdasarkan level user.
     */
    protected function redirectTo()
    {
        $user = auth()->user();

        if ($user->level === 'Admin') {
            return '/quiz/dashboard';
        }

        return route('norma.test.welcome');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $login = $request->login;

        $field = filter_var($login, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        $user = User::where($field, $login)->first();

        if ($user && $user->status != 'Aktif') {
            throw ValidationException::withMessages([
                'login' => ['Akun anda belum aktif.'],
            ]);
        }

        throw ValidationException::withMessages([
            'login' => [trans('auth.failed')],
        ]);
    }



}
