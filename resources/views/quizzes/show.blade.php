<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $quiz->quiz_title }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-noname.png') }}">
    <link href="{{ asset('css/styles-quizzes.css') }}" rel="stylesheet">
    <script src="{{ asset('js/quizzes-show.js') }}"></script>
</head>

<body>
    <h1>{{ $quiz->quiz_title }}</h1>
    <div id="time-display"></div>
    <input type="text" id="quiz_code" hidden name="quiz_code" value="{{$quiz_code}}">
    <form id="quiz-form" action="{{ route('reportings.store') }}" method="post">
        <input type="text" id="quiz_id" hidden name="quiz_id" value="{{$quiz->id}}">
        @csrf
        <div class="quiz-container">
            <div class="quiz-start active">
                <div class="quiz-description">{{ $quiz->quiz_description }}</div>
                <div class="quiz-category">{{ $quiz->quiz_category }}</div>
                <button class="start-button" id="start-button-1">Start</button>
            </div>
            <div class="quiz-username inactive">
                <label for="username">Entrez votre nom: </label>
                <input type="text" name="username" id="username" />
                <button class="start-button" id="start-button-2">Démarrer le quiz</button>
            </div>
            @foreach ($quiz->questions as $i => $question)
                <div class="quiz-section inactive">
                    <div class="quiz-question-{{ $i + 1 }}">{{ $question->question_text }}</div>
                    @if ($loop->last)
                        @foreach ($question->answers as $j => $answer)
                            @if ($answer->is_correct)
                                <div class="last-question correct-answer quiz-answer quiz-answer-{{ $j + 1 }}">
                                    {{ $answer->answer_text }}</div>
                            @else
                                <div class="last-question quiz-answer quiz-answer-{{ $j + 1 }}">
                                    {{ $answer->answer_text }}</div>
                            @endif
                        @endforeach
                    @else
                        @foreach ($question->answers as $j => $answer)
                            @if ($answer->is_correct)
                                <div class="correct-answer quiz-answer quiz-answer-{{ $j + 1 }}">
                                    {{ $answer->answer_text }}</div>
                            @else
                                <div class="quiz-answer quiz-answer-{{ $j + 1 }}">{{ $answer->answer_text }}
                                </div>
                            @endif
                        @endforeach
                    @endif

                </div>
            @endforeach

        </div>
    </form>




</body>

</html>
