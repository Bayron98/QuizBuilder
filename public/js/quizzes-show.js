
document.addEventListener("DOMContentLoaded", function () {

    const startButton1 = document.getElementById('start-button-1');
    const form = document.getElementById('quiz-form');
    const startButton2 = document.getElementById('start-button-2');
    const correctAnswer = document.querySelectorAll('.correct-answer');
    const lastQuestion = document.querySelectorAll('.last-question');
    const quizAnswer = document.querySelectorAll('.quiz-answer');

    startButton1.addEventListener('click', next);
    startButton2.addEventListener('click', startCounter);
    startButton2.addEventListener('click', next);
    correctAnswer.forEach(element => {
        element.addEventListener('click', calcScore);
    });
    lastQuestion.forEach(element => {
        element.addEventListener('click', showScore);
    });
    lastQuestion.forEach(element => {
        element.addEventListener('click', stopCounter);
    });
    quizAnswer.forEach(element => {
        element.addEventListener('click', next);
    });


    lastQuestion.forEach(element => {
        element.addEventListener('click', submit);
    });




    function next() {



        var activeDiv = document.querySelector('.active');
        activeDiv.classList.remove('active');
        activeDiv.classList.add('inactive');
        var nextDiv = activeDiv.nextElementSibling;
        nextDiv.classList.remove('inactive');
        nextDiv.classList.add('active');

    }



    form.addEventListener('submit', function(event) {
        event.preventDefault();

      });



    function submit() {
        const formData = new FormData(form);
        formData.append('score', score);
        formData.append('completion_time', maxTime-timeLeft);
        fetch('/reportings', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          console.log('Response:', data);
        })
    }

    let score = 0;
    function calcScore() {
        score++;
    }

    function showScore() {
        var divParent = document.createElement('div');
        divParent.setAttribute('class', 'inactive');
        divParent.setAttribute('class', 'quiz-score');

        var div1 = document.createElement('div');
        div1.setAttribute('class', 'score-title');
        div1.innerHTML = "Félicitation!";
        divParent.appendChild(div1);

        var div2 = document.createElement('div');
        div2.setAttribute('class', 'score-text');
        div2.innerHTML = "Votre score est: ";
        divParent.appendChild(div2);

        var div3 = document.createElement('div');
        div3.setAttribute('class', 'score');
        div3.innerHTML = score;
        divParent.appendChild(div3);

        var quizCode = document.getElementById('quiz_code').value;


        divParent.insertAdjacentHTML('beforeend', '<div class="share-text">Partgez vos résultats!</div>');

        divParent.insertAdjacentHTML('beforeend', '<div class="share-buttons">' +
        '<a id="facebook_share_link" target="_blank"' +
        `href="https://www.facebook.com/sharer/sharer.php?u=http://127.0.0.1:8000/quizzes/${quizCode}">`+
        '<svg style="color: blue" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 512 512"><path d="M480,257.35c0-123.7-100.3-224-224-224s-224,100.3-224,224c0,111.8,81.9,204.47,189,221.29V322.12H164.11V257.35H221V208c0-56.13,33.45-87.16,84.61-87.16,24.51,0,50.15,4.38,50.15,4.38v55.13H327.5c-27.81,0-36.51,17.26-36.51,35v42h62.12l-9.92,64.77H291V478.66C398.1,461.85,480,369.18,480,257.35Z" fill-rule="evenodd" fill="white"></path></svg>' +
        '</a>' +
        '<a id="twitter_share_link"  target="_blank"' +
        `href="https://twitter.com/intent/tweet?url=http://127.0.0.1:8000/quizzes/${quizCode}/&text=` + encodeURIComponent(`J'ai eu ${score} dans le quiz!`) +'" >'+
        '<svg style="color: blue" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 512 512"><title>ionicons-v5_logos</title><path d="M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z" fill="white"></path></svg>' +
        '</a>' +
        '</div>');

        document.querySelector('.quiz-container').appendChild(divParent);



    }



    // HTML elements
    var timeDisplay = document.getElementById('time-display');

    // Variables
    var maxTime = 10 * 60; // 10 minutes in seconds
    var timeLeft = maxTime;
    var timerId;

    // Function to update the time display
    function updateTimeDisplay() {
        var minutes = Math.floor(timeLeft / 60);
        var seconds = timeLeft % 60;
        var timeString = minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');
        timeDisplay.textContent = timeString + ' / 10:00';
    }

    function startCounter() {
        timeDisplay.classList.add("time-display-style");
        clearInterval(timerId);

        updateTimeDisplay();

        timerId = setInterval(function () {
            timeLeft--;

            updateTimeDisplay();

            if (timeLeft <= 0) {
                clearInterval(timerId);
                alert('Temps écoulé !');
                location.reload();
            }
        }, 1000);
    }

    function stopCounter(){
        timeDisplay.classList.remove("time-display-style");
        clearInterval(timerId);
        timeDisplay.textContent = "";
    }


});




