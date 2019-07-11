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

  let lvlId = document.querySelector('.lvl-id').innerHTML;
  //Select token with getAttribute
  let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');;
  //Select input values with the data you want to send
  let challengeId = document.querySelector('input[name="challenge_id"]').value;
  //Define your post url
  let url = "{{route('challenge.update', ['lvlId' => $lvlId])}}";
  console.log(url);
  //Define redirect if needed
  let redirect = url;

  if(answered === false) {
    fetch(url, {
          method: 'POST',
          headers: {
              "X-CSRF-TOKEN": token,
              "Content-Type": "application/json"                
          },
          mode: 'same-origin',
          body: JSON.stringify({
              user_answer: null,
              challenge_id: challengeId,
              _token: token,
              soyFetch: true
          })
      })
      .then((response) => {
        return response.json();
        })
      .then((data) => {
        if(data.status === 'ok') {
          window.location.href = redirect;
        }
      })  
      .catch(function (error) {
          console.log(error);
      })
  }

  
});

$('.game-area__display__img').on('click', function(e) {

  e.preventDefault();

  answered = true;

  this.closest('form').submit();

})
</script>
@endsection