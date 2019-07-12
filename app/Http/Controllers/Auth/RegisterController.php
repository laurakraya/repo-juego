<?php

namespace Contrareloj\Http\Controllers\Auth;

use Contrareloj\User;
use Contrareloj\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
     protected function validator(array $data)
     {
         $rules = [
             'name' => ['required', 'string', 'max:80', 'alpha'],
             'lastname' => ['required', 'string', 'max:80', 'alpha'],
             'email' => ['required', 'string', 'email', 'max:80', 'unique:users'],
             'password' => ['required', 'string', 'min:8', 'confirmed'],
         ];

         $messages = [
           'email.required' => 'El email no puede estar vacio',
           'email.max' => 'El maximo de caracteres es 50',
           'email.unique' => 'El email ya esta registrado',
           'email.email' => 'El email ingresado no tiene formato valido',
           'name.required' => 'El nombre no puede estar vacio',
           'name.string' => 'El nombre no debe contener numeros',
           'name.max' => 'El nombre excede el limite de caracteres',
           'lastname.required' => 'El apellido no puede estar vacio',
           'lastname.string' => 'El apellido no debe contener numeros',
           'lastname.max' => 'El apellido excede el limite de caracteres',
           'password.required' => 'Debe ingresar una contraseña',
           'password.min' => 'La contraseña debe tener al menos 8 caracteres',
           'password.max' => 'La contraseña debe tener menos caracteres',
           'name.alpha' => 'El nombre no puede contener numeros o acentos',
           'lastname.alpha' => 'El apellido no debe contener numeros o acentos'

         ];

         return Validator::make($data, $rules, $messages);
     }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Contrareloj\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
