<?php

namespace GonnaSolve\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GonnaSolve\Question;

class QuestionController extends Controller
{
    public function index() {
        $questions = DB::table('questions')
                        ->join('users', 'users.id', '=', 'questions.question_author')
                        ->select('users.id', 'users.name', 'users.description', 'questions.*')
                        ->get();
        return view('home', compact('questions'));
    }

    public function create(Request $request) {
        Question::create([
            'question_title' => $request->QuestionTitle,
            'question_content' => $request->QuestionDescription,
            'question_author' => $request->QuestionAuthor,
            'question_status' => 'created',
            'topic_id' => '1'
        ]);
        return redirect()->back();
    }

    public function showDetail($id) {
        $question = DB::table('questions')
                        ->join('users', 'users.id', '=', 'questions.question_author')
                        ->select('users.id', 'users.name', 'users.description', 'questions.*')
                        ->where('question_id', $id)
                        ->get();
        return view('question_detail', compact('question'));
    }
}
