<?php

namespace Contrareloj\Http\Controllers;

use Contrareloj\Image;
use Contrareloj\Level;
use Illuminate\Http\Request;

class ImageController extends Controller
{




 public function store(Request $req){
   $newImage = new Image();

   $levels = Level::all();

   $lvlId = $req["levels_id"];

   $path = $req->file("image")->store("public/levels/level" . $lvlId . "/");
   $fileName = basename($path);

   //dd($fileName);

    $newImage -> image = $fileName;
    $newImage -> birth_date = $req["birth_date"];
    $newImage -> name = $req["name"];
    $newImage -> levels_id = $req["levels_id"];

      $newImage-> save();

      $vac = compact('levels');

      return view("imageForm", $vac);
    }
}
