<?php

namespace Contrareloj\Http\Controllers;

use Illuminate\Http\Request;
use Contrareloj\User;

class rankingController extends Controller
{
  //funcion index para pasarle a la vista de ranking los datos del usuario
    public function index(){

      $datosRanking = User::orderBy('score', 'desc')
      ->paginate(3);
      $posicion=1;
      $vac = compact('datosRanking','posicion');

      return view("front.ranking", $vac);

    }


}
