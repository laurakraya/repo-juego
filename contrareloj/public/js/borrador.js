

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
