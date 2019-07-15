<?php

namespace Contrareloj\Http\Controllers;

use Contrareloj\User;
use Contrareloj\Level;
use Auth;



class rankingController extends Controller
{
  //funcion index para pasarle a la vista de ranking los datos del usuario
    public function index(){

      $datosRanking = User::orderBy('score', 'desc')
      ->paginate(3);
      $posicion=1;
      $niveles  = Level::all();
      $usuarioLogueado = Auth::user();
      $vac = compact('datosRanking','posicion','niveles', 'usuarioLogueado');

      return view("front.ranking", $vac);

    }

    public function levels(){
      $levels  = Level::all();
      $userScore =  Auth::user()->score;

        if(  $userScore > 100 ){
          $levelID2 = $levels-> id[2];
          $vac = compact('$levelID2');
          return view("front.ranking",$vac );
      }elseif($userScore > 200 ){
          $levelID3 = $levels-> id[3];
          $vac = compact('$levelID3');
          return view("front.ranking",$vac );
      }else {
        $levelID1 = $levels-> id[1];
        $vac = compact('$levelID1');
        return view("front.ranking",$vac);
      }
    }
}
