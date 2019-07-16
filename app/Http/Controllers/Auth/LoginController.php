<?php

namespace Contrareloj\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Contrareloj\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
protected function validateLogin(Request $req){



    $this->validate($req, [

            'email' => 'required|exists:users|max:50',
            'password' => 'required'
          ],
          [
            'email.required' => 'El email no puede estar vacio',
            'email.max' => 'El maximo de caracteres es 50',
            'email.exists' => 'El email no se encuentra registrado',
            'password.required' => 'La contraseña no puede estar vacia'
        ]
      );}




}
