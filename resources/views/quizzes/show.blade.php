<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$quiz->quiz_title}}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-noname.png') }}">
    <link href="{{ asset('css/styles-quizzes.css') }}" rel="stylesheet">
    <script src="{{asset('js/quizzes-show.js')}}"></script>
</head>
<body>
    <h1>{{$quiz->quiz_title}}</h1>
    <div class="quiz-start active">
        <div class="quiz-description">{{$quiz->quiz_description}}</div>
        <div class="quiz-category">{{$quiz->quiz_category}}</div>
    </div>
    {{-- <form id="quiz-form" action="{{route('quizzes.store')}}" method="post">
        @csrf
        <div class="quiz-container">
            @foreach ($quiz->questions as $question)
              <div class="quiz-section active">
                <div>{{$question->question_text}}</div>
                @foreach ($question->answers as $answer)
                   <div>{{$answer->answer_text}} {{$answer->is_correct}}</div>
                @endforeach
              </div>
            @endforeach

        </div>
        <button id='submit-btn' class="submit-button inactive">Créer le quiz</button>
    </form> --}}


</body>
</html>
