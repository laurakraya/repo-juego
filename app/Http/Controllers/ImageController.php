<?php

namespace Contrareloj\Http\Controllers;

use Contrareloj\Image;
use Contrareloj\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{

  public function create()
  {
    $levels = Level::all();    
    $vac = compact('levels');

    return view('imageForm', $vac);
    
  }



 public function store(Request $req){

   $this->validate($req, [
           'image' => 'mimes:jpeg,jpg,png',
           'birth_date' => 'required|date_format:Y-m-d',
           'name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:50'
         ],
         [
           'image.mimes' => 'El archivo elegido debe ser una imagen',
           'birth_date.date_format' => 'El formato de fecha debe ser 2019-01-01',
           'birth_date.required' => 'Debe incluir una fecha 2019-01-01',
           'name.required' => 'Debe completar el campo nombre',
           'name.regex' => 'El nombre no debe contener numeros',
           'name.max' => 'El maximo de caracteres es 50'
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
