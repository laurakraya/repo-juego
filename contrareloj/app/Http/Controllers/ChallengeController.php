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
        $challenge = Challenge::all()->find($req->challenge_id);

        $img1Id = $challenge->imageA_id;
        $img2Id = $challenge->imageB_id;

        $image1Date = Image::all()->find($img1Id)->birth_date;
        $image2Date = Image::all()->find($img2Id)->birth_date;

        $date1 = Carbon::parse($image1Date);
        $date2 = Carbon::parse($image2Date);

        $correctAnswer = $date1->lt($date2);

        $userAnswer = $req->user_answer;

        $answerWasRight = "";

        if(($userAnswer == 1 && $correctAnswer === true) || ($userAnswer == 2 && $correctAnswer === false)) {
            $answerWasRight = 1;
        } else
        {
            $answerWasRight = 0;
        }

        $challenge -> correct_answer = $answerWasRight;
        $challenge -> user_answer = $userAnswer;

        $challenge->update();

        return redirect()->action('ChallengeController@create');
    }

    
}
