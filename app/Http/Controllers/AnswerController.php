<?php

namespace GonnaSolve\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GonnaSolve\Answer;

class AnswerController extends Controller
{
    public function index() {
        $answers = DB::table('answers')
                ->join('questions', 'answers.question_id', '=', 'questions.question_id')
                ->join('users', 'answers.answer_author', '=', 'users.id')
                ->select('answers.answer_content', 'answers.created_at', 'answers.updated_at', 
                        'questions.question_title', 'questions.question_id', 'users.name')
                ->get();
        return view('answers', compact('answers'));
    }

    public function create(Request $request) {
        Answer::create([
            'answer_content' => $request->AnswerContent,
            'answer_author' => $request->AnswerAuthor,
            'answer_status' => 'created',
            'question_id' => $request->QuestionId
        ]);
        return redirect()->back();
    }
}
