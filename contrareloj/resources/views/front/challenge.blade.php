@extends('front.layout')

@section('content')
<main class="content">
  <div class="timer-container">
    <div class="timer"></div>
  </div>
  <div class="area-juego">
    <div class="area-juego__display">
      <form {{-- class="area-juego__btn" --}} action="" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="challenge_id" value="{{$challengeId}}">
        <input type="hidden" name="user_answer" value="1">
        {{-- <button type="submit">></button> --}}
        <button type="submit" class="area-juego__display__img" style="background-image: url('/storage/levels/level{{$lvlId}}/{{$img1->image}}')">
          <span>A</span>
        </button>
      </form>
      <form {{-- class="area-juego__btn" --}} action="" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="challenge_id" value="{{$challengeId}}">  
        <input type="hidden" name="user_answer" value="2">
        {{-- <button type="submit"><</button> --}}
        <button type="submit" class="area-juego__display__img" style="background-image: url('/storage/levels/level{{$lvlId}}/{{$img2->image}}')">
          <span>B</span>
        </button>
      </form>
      <p>Challenge número: {{$challengeNumber}}</p>
      <p>Respuestas correctas: {{$correctAnswers}}</p>
      <p>Puntaje: {{$userScore}}</p>
    </div>
    <div class="area-juego__opciones">
      {{--       <form class="area-juego__btn" action="" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="challenge_id" value="{{$challengeId}}">
        <input type="hidden" name="user_answer" value="3">
        <button type="submit">=</button>
      </form> --}}
    </div>
  </div>
  <section class="counter">
    Aca deberiamos poner como pasa el tiempo
  </section>
</main>
@endsection
@section('scripts')
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('js/circle-progress.min.js')}}"></script>
<script src="{{asset('js/timer.js')}}"></script>
@endsection