window.addEventListener('load', function() {

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
    
      //Select token with getAttribute
      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');;
      //Select input values with the data you want to send
      let challengeId = document.querySelector('input[name="challenge_id"]').value;
      //Define your post url
      let url = window.location.pathname;
     
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


});

