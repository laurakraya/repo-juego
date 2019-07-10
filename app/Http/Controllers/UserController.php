<?php

namespace Contrareloj\Http\Controllers;
use Contrareloj\User;
use Illuminate\Support\Facades\Auth;
use Validator;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function __construct()
      {
          $this->middleware('auth');
      }




    public function store(Request $req){

      $this->validate($req, [
      	    	'user_image' => 'mimes:jpeg,jpg,png|max:2048|required',
            ],
            ['user_image.mimes' => 'El archivo elegido debe ser una imagen',
            'user_image.max' => 'Eliga una imagen de menor tamaño' ,
            'user_image.required' => 'Debe elegir un archivo'
          ]
          );

    $user = Auth::User ();

    $path = $req->file("user_image")->store("public/profile");
    $fileName = basename($path);



     $user -> user_image = $fileName;

       $user-> save();

       return view("front/profile");
     }


 }
