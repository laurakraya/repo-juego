

var myVar = setInterval(sendAnswer, 10000);

function sendAnswer() {
  var url = 'https://localhost:8000/challenge';
  var data = {
    user_answer: 1, 
    challenge_id: 1, 
    csrf_token: 'completar'
  };

  fetch(url, {
    method: 'POST',
    body: JSON.stringify(data),
    headers:{
      'Content-Type': 'application/json'
    }
  }).then(res => res.json())
  .catch(error => console.error('Error:', error))
  .then(response => window.location.href = url);
}



function sendAnswer() {
  var lvlId = document.querySelector('.lvl-id').innerHTML;
  console.log(lvlId);
  var url = 'https://localhost:8000/challenge/' + lvlId;
  console.log(url);
  let challengeId = document.querySelector('input[name="challenge_id"]').value;

  var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  console.log(csrfToken);
  console.log(challengeId);
  var data = {
    user_answer: null, 
    challenge_id: challengeId, 
    csrf_token: csrfToken
  };
  fetch(url, {
    method: 'POST',
    body: JSON.stringify(data),
    headers:{
      'Content-Type': 'application/json'
    }
  }).then(res => res.json())
  .catch(error => console.error('Error:', error))
  .then(/* response => window.location.href = url */);
}

function () {
  let lvlId = document.querySelector('.lvl-id').innerHTML;
  //Select token with getAttribute
  let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  //Select input values with the data you want to send
  let challengeId = document.querySelector('input[name="challenge_id"]').value;
  //Define your post url
  let url = 'https://localhost:8000/challenge/' + lvlId;
  //Define redirect if needed
  let redirect = url;

  fetch(url, {
          headers: {
              "Content-Type": "application/json",
              "Accept": "application/json, text-plain, */*",
              "X-Requested-With": "XMLHttpRequest",
              "X-CSRF-TOKEN": token
          },
          method: 'post',
          credentials: "same-origin",
          body: JSON.stringify({
              user_answer: null,
              challenge_id: challengeId
          })
      })
      .then((data) => {
          window.location.href = redirect;
      })
      .catch(function (error) {
          console.log(error);
      });
}

timer.on('circle-animation-end', function (e) {

  $.ajaxSetup({

      headers: {

          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

      }
  });

  var lvlId = document.querySelector('.lvl-id').innerHTML;

  var challengeId = document.querySelector('input[name="challenge_id"]').value;

  var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  var url = 'http://127.0.0.1:8000/challenge/' + lvlId;
  
  //var url = "{{url('/challenge/" + lvlId + "')}}";

  //var url = "{{route('challenge.update', ['lvlId' => " + lvlId + "])}}";

  //var url = document.querySelector('.current-url').innerHTML;

  //console.log(url);
  
  var redirect = url;

  $.ajax({

    type: 'POST',

    url: url,

    data: {
      user_answer: null,
      challenge_id: challengeId,
      _token: token
    },

    success: function (data) {

      console.log(data);

      window.location.href = redirect;

    }

});
});


function () {
    
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
              _token: token
          })
      })
      .then((response) => {
           console.log(response);
          //window.location.href = redirect;
      })
      .catch(function (error) {
          console.log(error);
      });
}