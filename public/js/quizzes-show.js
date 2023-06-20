
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

    // Function to start the counter
    function startCounter() {
        timeDisplay.classList.add("time-display-style");
        // Clear previous interval (if any)
        clearInterval(timerId);

        // Update time display
        updateTimeDisplay();

        // Start the counter
        timerId = setInterval(function () {
            // Decrease time left by 1 second
            timeLeft--;

            // Update time display
            updateTimeDisplay();

            // Check if time is up
            if (timeLeft <= 0) {
                clearInterval(timerId);
                alert('Temps écoulé !');
                location.reload();
            }
        }, 1000); // Run the counter every second
    }

    function stopCounter(){
        timeDisplay.classList.remove("time-display-style");
        clearInterval(timerId);
        timeDisplay.textContent = "";
    }


});




