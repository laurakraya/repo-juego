var myVar = setInterval(sendAnswer, 3000);

function sendAnswer() {
    
    let lvlId = document.querySelector('.lvl-id').innerHTML;
    //Select token with getAttribute
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    //Select input values with the data you want to send
    let challengeId = document.querySelector('input[name="challenge_id"]').value;
    //Define your post url
    let url = 'http://localhost:8000/challenge/' + lvlId;
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