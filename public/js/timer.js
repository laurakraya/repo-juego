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
        duration: 3000,
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

timer.on('circle-animation-end', function () {
    
    let lvlId = document.querySelector('.lvl-id').innerHTML;
    //Select token with getAttribute
    let _token = "{{ csrf_token }}";
    //Select input values with the data you want to send
    let challengeId = document.querySelector('input[name="challenge_id"]').value;
    //Define your post url
    let url = 'http://localhost:8000/challenge/' + lvlId;
    //Define redirect if needed
    let redirect = url;

    fetch(url, {
            method: 'post',
            headers: {
                "X-CSRF-TOKEN": _token,
                "Content-Type": "application/json"                
            },
            mode: 'no-cors',
            //credentials: "same-origin",
            body: JSON.stringify({
                user_answer: null,
                challenge_id: challengeId
            })
        })
        .then((data) => {
            console.log(data);
            //window.location.href = redirect;
        })
        .catch(function (error) {
            console.log(error);
        });
});
