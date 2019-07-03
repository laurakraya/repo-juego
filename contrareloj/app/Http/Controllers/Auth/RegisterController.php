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
             'name' => ['required', 'string', 'max:80'],
             'lastname' => ['required', 'string', 'max:80'],
             'email' => ['required', 'string', 'email', 'max:80', 'unique:users'],
             'password' => ['required', 'string', 'min:8', 'confirmed'],
         ];

         $messages = [
           'required' => 'El :attribute es obligatorio.',
           'string' => ':attribute debe ser una cadena de texto.',
           'max' =>'El :attribute no debe superar :max',
           'min' =>'El :attribute deber tener al menos :min caracteres.',
           'confirmed' =>'Las :attribute no coinciden',
           'unique' =>'El :attribute ya esta en uso',

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
