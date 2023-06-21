<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class QuizController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['index','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = User::find(Auth::id())->quizzes;
        return view('quizzes.index', ['quizzes'=>$quizzes]);
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
            $quiz = new Quiz();
            $quiz->quiz_title = $request->input('quiz-title') ;
            $quiz->quiz_description = $request->input('quiz-description');
            $quiz->quiz_category = $request->input('quiz-category');
            $access_code = Str::random(8);
            $quiz->access_code = $access_code;
            $quiz->user_id = Auth::id();
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


                foreach ($answerTexts as $index=>$answerText) {
                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer_text = $answerText;

                    $index+1 == $request->input("question-answer-$i")? $answer->is_correct = true:"";
                    $question->answers()->save($answer);
                }
            }
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
        return view('quizzes.show', ['quiz'=>$quiz, 'quiz_code'=>$code]);
    }


    public function edit($id)
    {
        return view("quizzes.edit", ['id'=>$id]);
    }

    public function update(Request $request, $id)
    {
        $quiz = Quiz::find($id);

        $quiz_title = $request->input('quiz-title') ;
        $quiz_description = $request->input('quiz-description');
        $quiz_category = $request->input('quiz-category');

        empty($quiz_title)?"":$quiz->quiz_title = $quiz_title ;
        empty($quiz_description)?"":$quiz->quiz_description= $quiz_description;
        empty($quiz_category)?"":$quiz->quiz_category = $quiz_category;

        $quiz->save();

        return redirect('/quizzes')->with('success', 'Quiz mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::find($id);
        $quiz->delete();
        return redirect()->route('quizzes.index');
    }

    function search() {
        return view('quizzes.search');
    }


    function get(Request $request) {
        return redirect()->route("quizzes.show", $request->access_code);
    }
}
