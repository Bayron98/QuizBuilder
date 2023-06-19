<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quizzes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){

        }else{
            $quiz = new Quiz();
            $quiz->quiz_title = $request->input('quiz-title') ;
            $quiz->quiz_description = $request->input('quiz-description');
            $quiz->quiz_category = $request->input('quiz-category');
            $access_code = Str::random(8);
            $quiz->access_code = $access_code;
            $quiz->save();
            for ($i = 1; $i <= (int)$request->input('quiz-questions-nbr'); $i++){
                $question = new Question();
                $question->question_text = $request->input("question-text-$i") ;
                $quiz->questions()->save($question);
                $answerTexts = [];
                for ($j = 1; $j <= 4; $j++) {
                    $answerText = $request->input("answer-text-$i-$j");
                    if (!is_null($answerText)) {
                        $answerTexts[] = $answerText;
                    }
                }

                // Now you have an array of answer texts for the current question
                // You can save them to the respective answer model or perform any other logic
                foreach ($answerTexts as $index=>$answerText) {
                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer_text = $answerText;

                    $index+1 == $request->input("question-answer-$i")? $answer->is_correct = true:"";
                    $question->answers()->save($answer);
                }
            }


        }
        return view('quizzes.access_code', ['access_code'=>$access_code]);
    }


    public function show($code)
    {
        $quiz = Quiz::where('access_code', $code)->first();
        return view('quizzes.show', ['quiz'=>$quiz]);
    }


    public function edit($code)
    {
        //
    }

    public function update(Request $request, $code)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        //
    }

    function search() {
        return view('quizzes.search');
    }

    function get(Request $request) {
        return redirect()->route("quizzes.show", $request->access_code);
    }
}
