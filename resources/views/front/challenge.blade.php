@extends('front.layout')

@section('content')
<main class="content">
  <div class="timer-container">
    <div class="timer"></div>
  </div>
  <div class="area-juego">
  <span class="lvl-id" style="display: none">{{$lvlId}}</span>
  <span class="current-url" style="display: none">{{url()->current()}}</span>
    <div class="area-juego__display">
      <form action="" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="challenge_id" value="{{$challengeId}}">
        <input type="hidden" name="user_answer" value="1">
        <button type="submit" class="area-juego__display__img" style="background-image: url('/storage/levels/level{{$lvlId}}/{{$img1->image}}')">
          <span>A</span>
        </button>
      </form>
      <form action="" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="challenge_id" value="{{$challengeId}}">  
        <input type="hidden" name="user_answer" value="2">
        <button type="submit" class="area-juego__display__img" style="background-image: url('/storage/levels/level{{$lvlId}}/{{$img2->image}}')">
          <span>B</span>
        </button>
      </form>
      <p>Challenge número: {{$challengeNumber}}</p>
      <p>Respuestas correctas: {{$correctAnswers}}</p>
      <p>Puntaje: {{$userScore}}</p>
      {{url('/challenge/hola/')}}
    </div>
    <form action="" method="POST" class="timer-form">
      {{csrf_field()}}
      <input type="hidden" name="challenge_id" value="{{$challengeId}}">  
    </form>
    <div class="area-juego__opciones">
    </div>
  </div>
</main>
@endsection

@section('scripts')
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('js/circle-progress.min.js')}}"></script>
{{-- <script src="{{asset('js/timer.js')}}"></script> --}}
<script>

var answered = false;

var timer = $('.timer').circleProgress({

    value: 0,
    size: 100,
    startAngle: 4.75,
    reverse: false,
    fill: {
        gradient: ["#440A7F", "#6a10c6"]
    },
    lineCap: 'round',
    animation: {
        duration: 3500,
        easing: "circleProgressEasing"
    },
    animationStartValue: 1

});

timer.on('circle-animation-progress', function (e, v) {

    var obj = $(this).data('circle-progress'),
        ctx = obj.ctx,
        s = obj.size + 3,
        sv = (3 - (3 * v).toFixed()),
        fill = obj.arcFill;

    ctx.save();
    ctx.font = "bold " + s / 2.5 + "px sans-serif";
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
    ctx.fillStyle = fill;
    ctx.fillText(sv, s / 2, s / 2 + 2.5);
    ctx.restore();

});

timer.on('circle-animation-end', function(e) {

  var timerForm = $('.timer-form');

  if(answered === false) {
    timerForm.submit();
  }
  
});

$('.area-juego__display__img').on('click', function(e) {

  e.preventDefault();

  answered = true;

  this.closest('form').submit();

})
</script>
@endsection