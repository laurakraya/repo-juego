<?php

namespace Contrareloj\Http\Controllers;

use Contrareloj\Image;
use Contrareloj\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{




 public function store(Request $req){

   $this->validate($req, [
           'image' => 'mimes:jpeg,jpg,png',
           'birth_date' => 'required|date_format:Y-m-d',
         ],
         [
           'image.mimes' => 'El archivo elegido debe ser una imagen',
           'birth_date.date_format' => 'El formato de fecha debe ser AÑO-MES-DIA',
           'birth_date.required' => 'Debe incluir una fecha AÑO-MES-DIA'
       ]
       );

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
