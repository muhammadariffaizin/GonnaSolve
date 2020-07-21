<?php

namespace GonnaSolve\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GonnaSolve\Answer;
use GonnaSolve\Question;

class QuestionController extends Controller
{
    public function index() {
        $count_answer = DB::table('questions')
                        ->join('answers', 'questions.question_id', '=', 'answers.question_id')
                        ->select('questions.question_id', DB::raw('COUNT(*) AS count_answer'))
                        ->groupBy('questions.question_id');
        $questions_property = DB::table('questions')
                            ->select('questions.question_id', 'questions.question_title', 'questions.question_content',
                                    'questions.question_author', 'questions.created_at', 'questions.updated_at', 
                                    'count_answer.count_answer')
                            ->leftJoinSub($count_answer, 'count_answer', function($join) {
                                $join->on('questions.question_id', '=', 'count_answer.question_id');
                            });
        $questions = DB::table('users')
                    ->select('users.id', 'users.name', 'users.description', 'questions_property.*')
                    ->leftJoinSub($questions_property, 'questions_property', function($join) {
                        $join->on('users.id', '=', 'questions_property.question_author');
                    })
                    ->orderBy('questions_property.question_author', 'DESC')
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
        $answers = DB::table('answers')
                        ->join('users', 'users.id', '=', 'answers.answer_author')
                        ->select('users.id', 'users.name', 'users.description', 'answers.*')
                        ->where('question_id', $id)
                        ->orderby('answers.updated_at', 'DESC')
                        ->get();
        // return compact('question', 'answers');
        return view('question_detail', compact('question', 'answers'));
    }
}
