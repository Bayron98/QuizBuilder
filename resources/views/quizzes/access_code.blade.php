<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Code quiz</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-noname.png') }}">
    <link href="{{ asset('css/styles-quizzes.css') }}" rel="stylesheet">
    <script src="{{asset('js/quizzes-create.js')}}"></script>
</head>
<body>
       <div class="fill"></div>
        <div class="container">
            <div class="section active">
                <div class="access_code-p1">Votre quiz a été créé avec succès !</div>
                <div class="access_code-p2">Vous trouverez ci-dessous le code pour accéder au quiz créé</div>
                <div class="access_code">{{$access_code}}</div>
            </div>

        </div>



</body>
</html>
