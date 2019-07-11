<?php

namespace Contrareloj\Http\Controllers;

use Contrareloj\Image;
use Contrareloj\Challenge;
use Contrareloj\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function create($lvlId = 1) 
    {
        $lastChallenge = Challenge::all()->where('user_id', '=', Auth::user()->id)->where('state', '=', '0')->last();

        if($lastChallenge) {
            $lastChallengeDate = $lastChallenge -> created_at;

            $diffInMin = $lastChallengeDate->diffInMinutes(Carbon::now());
    
            if($diffInMin >= 1) {
                Challenge::where('user_id', '=', Auth::user()->id)->where('state', '=', '0')->update(['state' => '1']);
            }
        }


        $images = Image::get()->where('levels_id', '=', $lvlId)->shuffle()->take(2);

        $challenge = new Challenge();

        $challenge -> imageA_id = $images[0]->id;
        $challenge -> imageB_id = $images[1]->id;
        $challenge -> user_id = Auth::user()->id; 

        $challenge->save();

        $stateCero = Challenge::all()->where('user_id', '=', Auth::user()->id)->where('state', '=', '0');
        $stateCeroCount = $stateCero->count();

        $answeredCorrectly = Challenge::all()->where('user_id', '=', Auth::user()->id)->where('correct_answer', '=', '1')->where('state', '=', '0');
        $answeredCorrectlyCount = $answeredCorrectly->count();

        if($stateCeroCount == 10) {

            if($answeredCorrectlyCount >= 7) {
                $user = User::find(Auth::user()->id);
                $user -> score += 100;
    
                $user->update();
            }

            Challenge::where('user_id', '=', Auth::user()->id)->where('state', '=', '0')->update(['state' => '1']);

            return redirect()->action('RankingController@index');

        } else {

            $challengeId = Challenge::all()->where('user_id', '=', Auth::user()->id)->max('id');
            $userScore = User::find(Auth::user()->id)->score;

            return view('front.challenge', [
                'img1' => $images[0], 
                'img2' => $images[1],
                'challengeId' => $challengeId,
                'challengeNumber' => $stateCeroCount,
                'correctAnswers' => $answeredCorrectlyCount,
                'userScore' => $userScore,
                'lvlId' => $lvlId
            ]);

        }
    }

    public function update(Request $req, $lvlId = 1) 
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

            $user = User::find(Auth::user()->id);
            $user -> score += 10;

            $user->update();
        } 
        
        $challenge -> correct_answer = $answerWasRight;
        $challenge -> user_answer = $userAnswer;

        $challenge->update();

        return redirect()->action('ChallengeController@create', [$lvlId]);
    }

    
}
