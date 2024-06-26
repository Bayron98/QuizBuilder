<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Se connecter</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-noname.png') }}">
    <link href="{{ asset('css/styles-auth.css') }}" rel="stylesheet">
</head>

<body>

    <h1>Se connecter</h1>
    <form id="quiz-form" action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-container">
            @if ($errors->any())

                @foreach ($errors->all() as $error)
                    <div class="alert">{{ $error }}</div>
                @endforeach

            @endif
            <label for="email">Email: </label>
            <input type="text" name="email" id="email">
            <label for="password">Mot de passe: </label>
            <input type="password" name="password" id="password">
            <input type="submit" id="submit-btn" value="Se connecter">

        </div>
    </form>
    <a style="position: fixed; top: 20px; right: 20px; background-color: #42A5FF; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: bold; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); z-index: 9999;" href="{{ route('home') }}">Retour au page d'accueil</a>


</body>

</html>
