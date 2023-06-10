
document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById('quiz-form');

    form.addEventListener('submit', function(event) {
        event.preventDefault();
    });

    var submit = document.getElementById('submit-btn');

    submit.addEventListener('click', function(event) {
        form.submit();
    });

    const continueButton = document.querySelector('.continue-button');
    let k = 0;
    let nbr;
    continueButton.onclick = function () {
        if(k === 1){
           nbr = addQuestions();
        }else if (k === Number(nbr)+1){
            continueButton.classList.remove('active');
            continueButton.classList.add('inactive');
            var submit = document.getElementById('submit-btn');
            submit.classList.remove('inactive');
        }
        k++;
        var activeDiv = document.querySelector('.active');
        activeDiv.classList.remove('active');
        activeDiv.classList.add('inactive');
        var nextDiv = activeDiv.nextElementSibling;
        nextDiv.classList.remove('inactive');
        nextDiv.classList.add('active');

    }

    function addQuestions() {
        const quizQuestionsNbr = document.getElementById("quiz-questions-nbr");
        let nbr;
        nbr = quizQuestionsNbr.value;

        for (let i = 1; i <= nbr; i++) {
            // Créer une div pour chaque section de quiz
            const quizSection = document.createElement("div");
            quizSection.classList.add("quiz-section");
            quizSection.classList.add("inactive");

            // Créer une étiquette pour la question
            const questionLabel = document.createElement("label");
            questionLabel.setAttribute("for", `question-text-${i}`);
            questionLabel.textContent = `Question ${i}`;

            // Créer un champ de saisie pour la question
            const questionInput = document.createElement("input");
            questionInput.setAttribute("name", `question-text-${i}`);
            questionInput.setAttribute("id", `question-text-${i}`);
            questionInput.setAttribute("type", "text");
            // questionInput.setAttribute("required", "");

            const correctAnswerSelect = document.createElement("select");
            correctAnswerSelect.setAttribute("name", `question-answer-${i}`);

            const label = document.createElement("label");
            label.setAttribute("id", "label-correct");
            label.textContent = "Choisir la réponse correcte";



            const option = document.createElement("option");
            option.value = " ";
            option.text = " ";
            correctAnswerSelect.appendChild(option);

            // Créer un bouton pour ajouter une réponse
            const addAnswerButton = document.createElement("button");
            addAnswerButton.setAttribute('id', 'add-asnwer-button');
            addAnswerButton.textContent = "Ajouter une réponse";
            let j = 1;
            addAnswerButton.addEventListener("click", function () {
                if (j <= 4) {
                    const option = document.createElement("option");
                    option.value = j;
                    option.text = j;
                    correctAnswerSelect.appendChild(option);
                    // Créer une étiquette pour la réponse
                    const answerLabel = document.createElement("label");
                    answerLabel.setAttribute("for", `answer-text-${i}-${j}`);
                    answerLabel.textContent = `Réponse ${i}-${j}`;

                    // Créer un champ de saisie pour la réponse
                    const answerInput = document.createElement("input");
                    answerInput.setAttribute("name", `answer-text-${i}-${j}`);
                    answerInput.setAttribute("id", `answer-text-${i}-${j}`);
                    answerInput.setAttribute("type", "text");
                    // answerInput.setAttribute("required", "");

                    // Ajouter les éléments de réponse à la section de quiz
                    quizSection.appendChild(answerLabel);
                    quizSection.appendChild(answerInput);
                } else {
                    alert('Seulement 4 réponses par question sont permis');
                }
                j++;
            });

            // Ajouter les éléments de question à la section de quiz
            quizSection.appendChild(questionLabel);
            quizSection.appendChild(questionInput);
            quizSection.appendChild(correctAnswerSelect);
            quizSection.appendChild(addAnswerButton);

            const parent = correctAnswerSelect.parentElement;
            parent.insertBefore(label, correctAnswerSelect);



            // Ajouter la section de quiz à un conteneur existant dans votre page HTML
            const quizContainer = document.querySelector(".quiz-container");
            quizContainer.appendChild(quizSection);

        }
        return nbr;

    }
});
