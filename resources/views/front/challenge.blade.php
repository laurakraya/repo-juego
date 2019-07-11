@extends('front.layout')

@section('content')
<main class="content game">
  <h1 class="game-title">
    @if ($lvlId == 1)
      ¿Quién es más viejo?
    @else
      ¿Cuál se inventó primero?
    @endif
  </h1>
  <div class="game-area">
      <div class="timer-container">
          <div class="timer"></div>
        </div>
  <span class="lvl-id" style="display: none">{{$lvlId}}</span>
  <span class="current-url" style="display: none">{{url()->current()}}</span>
    <div class="game-area__display">
      <form action="" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="challenge_id" value="{{$challengeId}}">
        <input type="hidden" name="user_answer" value="1">
        <button type="submit" class="game-area__display__img" style="background-image: url('/storage/levels/level{{$lvlId}}/{{$img1->image}}')">
          <span></span>
        </button>
      </form>
      <form action="" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="challenge_id" value="{{$challengeId}}">  
        <input type="hidden" name="user_answer" value="2">
        <button type="submit" class="game-area__display__img" style="background-image: url('/storage/levels/level{{$lvlId}}/{{$img2->image}}')">
          <span></span>
        </button>
      </form>
    </div>
    <div class="game-area__info">
        <p>Challenge número: <span>{{$challengeNumber}} / 10</span></p>
        <p>Respuestas correctas: <span>{{$correctAnswers}} / 10</span></p>
        <p>Puntaje de la partida: <span>{{$correctAnswers * 10}}</span></p>
    </div>
{{--     <form action="" method="POST" class="timer-form">
      {{csrf_field()}}
      <input type="hidden" name="challenge_id" value="{{$challengeId}}">  
    </form> --}}
    <div class="game-area__opciones">
    </div>
  </div>
</main>
@endsection

@section('scripts')
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('js/circle-progress.min.js')}}"></script>
<script src="{{asset('js/timer.js')}}"></script>
@endsection