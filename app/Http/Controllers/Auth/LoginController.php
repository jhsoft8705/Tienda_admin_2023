<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
    protected $redirectTo = '/dashboard';

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'exists:users,' . $this->username() . ',estado,1',
            'password' => 'required|string',
        ], [
            $this->username() . '.exists' => 'El correo que ingreso no esta registrado o se encuentra deshabilitado.'
        ]);
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {

            if (auth()->user()->estado == 0) {
                Auth::logout();
                return back()->withErrors(['email' => 'Tu cuenta esta deshabilitada, por favor contacta con un administrador.']);
            }
            $usuario = User::find(auth()->user()->user_id);
            $usuario->device_token = $request->device_token;
            $usuario->update();
            return redirect($this->redirectTo);
        } else {
            return back()->withErrors(['email' => 'Los datos que ingreso no coninciden con nuestras credenciales']);
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
}
