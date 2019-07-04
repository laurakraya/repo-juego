<?php

namespace Contrareloj\Http\Controllers;

use Contrareloj\Image;
use Contrareloj\Challenge;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function create() 
    {
        $lastChallenge = Challenge::all()->where('user_id', '=', Auth::user()->id)->where('status', '=', '0')->max('id');

        // PRIMER IF

        //Si la fecha de lastChallenge tiene una diferencia mayor a 2min con la fecha actual, cambiar el estado agarrar todas los challenges con state 0 y cambiárselo a 1
        
        //Si la diferencia es menor, ejecuta la siguiente condición


        //SEGUNDO IF

        //Si la count de challenges del usuario con state 0 es menor a 10, ejecutar create challenge

        //Si es igual o mayor, llevar a vista con botón de jugar otro

        $images = Image::get()->shuffle()->take(2);


        $challenge = new Challenge();

        $challenge -> imageA_id = $images[0]->id;
        $challenge -> imageB_id = $images[1]->id;
        $challenge -> user_id = Auth::user()->id; 

        $challenge->save();

        $challengeId = Challenge::all()->where('user_id', '=', Auth::user()->id)->max('id');

        return view('front.challenge', [
            'img1' => $images[0], 
            'img2' => $images[1],
            'challengeId' => $challengeId
        ]);
    }

    public function update(Request $req) 
    {
        $challenge = Challenge::find($req->challenge_id);

        $img1Id = $challenge->imageA_id;
        $img2Id = $challenge->imageB_id;

        $image1Date = Image::find($img1Id)->birth_date;
        $image2Date = Image::find($img2Id)->birth_date;

        $date1 = Carbon::parse($image1Date);
        $date2 = Carbon::parse($image2Date);

        $correctAnswer = $date1->lt($date2);

        $userAnswer = $req->user_answer;

        $answerWasRight = 0;

        if(($userAnswer == 1 && $correctAnswer === true) || ($userAnswer == 2 && $correctAnswer === false)) {
            $answerWasRight = 1;
        } 
        
        $challenge -> correct_answer = $answerWasRight;
        $challenge -> user_answer = $userAnswer;

        $challenge->update();

        return redirect()->action('ChallengeController@create');
    }

    
}
