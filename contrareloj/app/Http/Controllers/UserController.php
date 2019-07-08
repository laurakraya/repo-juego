<?php

namespace Contrareloj\Http\Controllers;
use Contrareloj\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function __construct()
      {
          $this->middleware('auth');
      }


    public function store(Request $req){
    $user = Auth::User ();

    $path = $req->file("user_image")->store("public/profile");
    $fileName = basename($path);



     $user -> user_image = $fileName;

       $user-> save();

       return view("front/profile");
     }


 }
