<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Créer un quiz</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-noname.png') }}">
    <link href="{{ asset('css/styles-quizzes.css') }}" rel="stylesheet">
    <script src="{{asset('js/quizzes-create.js')}}"></script>
</head>
<body>
    <h1>Créer un quiz</h1>
    <form id="quiz-form" action="{{route('quizzes.store')}}" method="post">
        @csrf
        <div class="quiz-container">
            <div class="quiz-section active">
                <label for="quiz-title">Titre du quiz</label>
                <input name="quiz-title" id="quiz-title" type="text" >
                <label for="quiz-description">Description du quiz</label>
                <input name="quiz-description" id="quiz-description" type="text" >
                <label for="quiz-category">Catégorie du quiz</label>
                <input name="quiz-category" id="quiz-category" type="text" >
            </div>
            <div class="quiz-section inactive">
                <label for="quiz-questions-nbr">Le nombre des questions</label>
                <select name="quiz-questions-nbr" id="quiz-questions-nbr">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                <br>
                <div>* actuellement le nombre des questions est limité au 10 questions</div>
            </div>

        </div>
        <button id='submit-btn' class="submit-button inactive">Créer le quiz</button>
    </form>
    <button class="continue-button">Continuer</button>

    @if(Auth::check())
    <a style="position: fixed; top: 20px; right: 20px; background-color: #42A5FF; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: bold; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); z-index: 9999;" href="{{ route('dashboard') }}">Retour au dashboard</a>
    @else
    <a style="position: fixed; top: 20px; right: 20px; background-color: #42A5FF; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: bold; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); z-index: 9999;" href="{{ route('home') }}">Retour au page d'accueil</a>
    @endif


</body>
</html>
