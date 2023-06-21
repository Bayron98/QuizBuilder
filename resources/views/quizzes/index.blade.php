<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-noname.png') }}">
    <link href="{{ asset('css/styles-list-quizzes.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Liste de vos quizzes</h1>

        @if (sizeof($quizzes) === 0)
            <h1>Aucun quiz à afficher</h1>
        @else
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Catégorie</th>
                            <th>Code d'accès</th>
                            <th>Date de création</th>
                            <th>Date de mise à jour</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quizzes as $quiz)
                            <tr>
                                <td>{{ $quiz->quiz_title }}</td>
                                <td>{{ $quiz->quiz_description }}</td>
                                <td>{{ $quiz->quiz_category }}</td>
                                <td>{{ $quiz->access_code }}</td>
                                <td>{{ $quiz->created_at }}</td>
                                <td>{{ $quiz->updated_at }}</td>
                                <td>
                                    <a href="{{ route('quizzes.edit', $quiz->id) }}"
                                        class="btn btn-primary">Modifier</a>
                                    <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST"
                                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce quiz ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn">Supprimer</button>
                                    </form>
                                    <a href="{{ route('reportings.show', $quiz->id) }}" class="btn btn-success">Voir le
                                        reporting</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        @endif

    </div>
    </div>

    <a style="position: fixed; top: 20px; right: 20px; background-color: #42A5FF; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: bold; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); z-index: 9999;" href="{{ route('dashboard') }}">Retour au dashboard</a>


</body>

</html>
