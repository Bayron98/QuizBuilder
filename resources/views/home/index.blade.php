<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QuizBuilder</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-noname.png') }}">
    <link href="{{ asset('css/styles-home.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="section description-section">
            <div class="image-container">
                <img class="logo" src="{{ asset('images/logo.png') }}" alt="QuizBuilder">
            </div>
            <div class="description-header">Bienvenue sur QuizBuilder, la plateforme en ligne ultime pour créer et gérer
                facilement des quiz interactifs !</div>
            <div class="description">Créez des quiz interactifs facilement. Stimulez l'apprentissage, évaluez les
                compétences et suivez les performances des apprenants. Rejoignez-nous dès maintenant !</div>
        </div>
        <div class="section actions-section">
            <div>
                <a href="{{ route('quizzes.create') }}"><button>Créer un quiz</button></a>
                <a href="{{ route('quizzes.search') }}"><button>Passer un quiz</button></a>
            </div>
            <div class="separator"> ou </div>

            <div>
                <a href="{{ route('login') }}"><button>Se connecter</button></a>
                <div class="signup-container">Première fois sur QuizBuilder ? <a class="signup-a" href="{{ route('register') }}">S’INSCRIRE</a></div>
            </div>
        </div>
    </div>
</body>

</html>
