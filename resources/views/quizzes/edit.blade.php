<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier le quiz</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-noname.png') }}">
    <link href="{{ asset('css/styles-quizzes.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Modifier le quiz</h1>
    <form id="quiz-form" action="{{route('quizzes.update', $id)}}" method="post">
        @method('PUT')
        @csrf
            <div class="active">
                <label for="quiz-title">Titre du quiz</label>
                <input name="quiz-title" id="quiz-title" type="text" >
                <label for="quiz-description">Description du quiz</label>
                <input name="quiz-description" id="quiz-description" type="text" >
                <label for="quiz-category">Catégorie du quiz</label>
                <input name="quiz-category" id="quiz-category" type="text" >
            </div>
            <button id='submit-btn' class="submit-button" style="margin:  5px auto;" >Mettre à jour le quiz</button>
    </form>
    <a style="position: fixed; top: 20px; right: 20px; background-color: #42A5FF; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: bold; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); z-index: 9999;" href="{{ route('quizzes.index') }}">Retour</a>



</body>
</html>
