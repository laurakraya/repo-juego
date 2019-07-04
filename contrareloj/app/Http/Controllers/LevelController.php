<?php

namespace Contrareloj\Http\Controllers;

use Contrareloj\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index() {

        $levels = Level::all();
        $vac = compact('levels');

        return view('imageForm', $vac);
        
    }
}
