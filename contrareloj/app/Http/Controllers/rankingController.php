<?php

namespace Contrareloj\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class rankingController extends Controller
{
    public function index(){
      $puntos = User::All()
      $vac = compact("puntos")
      return view("ranking",$vac);
    }

}
