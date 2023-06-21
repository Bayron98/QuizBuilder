<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-noname.png') }}">
    <link href="{{ asset('css/styles-dashboard.css') }}" rel="stylesheet">
</head>

<body>
    <div class="dashboard">
        <h1>Tableau de bord utilisateur</h1>
        <p>Bienvenue, {{ $name }} !</p>

        <div class="actions">
            <a href="{{ route('quizzes.create') }}">Créer un quiz</a>
            <a href="{{ route('quizzes.index') }}">Gérer les quiz</a>
            <a href="{{ route('update.form') }}">Modifier les informations du compte</a>
            <a href="{{ route('logout') }}">Se déconnecter</a>
        </div>
    </div>



</body>

</html>
