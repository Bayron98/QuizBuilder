<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporting du quiz</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-noname.png') }}">
    <link href="{{ asset('css/styles-list-quizzes.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Reporting du quiz</h1>
        <h2>Nombre des utilisateurs:  <b>{{count($reportings)}}</b></h2>
        @if (sizeof($reportings) === 0)
            <h1>Aucun utilisateur n'a passé le quiz</h1>
        @else
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom d'utilisateur</th>
                            <th>Score</th>
                            <th>Temps de complétion en secondes</th>
                            <th>Date de passage</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reportings as $reporting)
                            <tr>
                                <td>{{ $reporting->username }}</td>
                                <td>{{ $reporting->score }}</td>
                                <td>{{ $reporting->completion_time }}</td>
                                <td>{{ $reporting->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <a style="position: fixed; top: 20px; right: 20px; background-color: #42A5FF; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: bold; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); z-index: 9999;"
            href="{{ route('quizzes.index') }}">Retour</a>


    </div>



</body>

</html>
