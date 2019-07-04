<?php

namespace Contrareloj\Http\Controllers;

use Contrareloj\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{




 public function store(Request $req){
   $newImage = new Image();

   $path = $req->file("image")->store("public");
   $fileName = basename($path);

   //dd($fileName);

    $newImage -> image = $fileName;
    $newImage -> birth_date = $req["birth_date"];
    $newImage -> name = $req["name"];
    $newImage -> levels_id = $req["levels_id"];

      $newImage-> save();

      return view("imageForm");
    }
}
