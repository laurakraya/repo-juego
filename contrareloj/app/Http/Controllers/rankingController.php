<?php

namespace Contrareloj\Http\Controllers;

use Illuminate\Http\Request;
use Contrareloj\User;

class rankingController extends Controller
{
    public function index(){

      $puntos = User::all();

      $vac = compact('puntos');

      return view("front.ranking", $vac);

    }

}
