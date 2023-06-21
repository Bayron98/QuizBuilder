<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Passer un quiz</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-noname.png') }}">
    <link href="{{ asset('css/styles-quizzes.css') }}" rel="stylesheet">
    <script src="{{asset('js/quizzes-create.js')}}"></script>
</head>
<body>
    <h1>Passer un quiz</h1>
    <form id="quiz-form" action="{{route('quizzes.get')}}" method="get">
        <div class="quiz-container">
            <div class="quiz-section active">
                <label for="access_code">Entrez le code du quiz</label>
               <input name="access_code" id="access_code" type="text" >
            </div>
            <button id='submit-btn' class="submit-button" style="margin: 0px; margin-top: 10px">Trouver le quiz</button>
        </div>
    </form>
    <a style="position: fixed; top: 20px; right: 20px; background-color: #42A5FF; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: bold; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); z-index: 9999;" href="{{ route('home') }}">Retour au page d'accueil</a>



</body>
</html>
