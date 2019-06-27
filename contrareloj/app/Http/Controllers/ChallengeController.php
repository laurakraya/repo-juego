<?php

namespace App\Http\Controllers;

use App\Image;
use App\Challenge;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function challenge() 
    {

        $images = Image::get()->shuffle()->slice(0, 2);

        return view('front.challenge', [
            'img1' => $images[0], 
            'img2' => $images[1]
        ]);
    }
}
