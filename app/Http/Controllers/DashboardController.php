<?php

namespace GonnaSolve\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use GonnaSolve\Question;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
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
                    ->where('users.id', $id)
                    ->get();
        $answers = DB::table('answers')
                ->join('questions', 'answers.question_id', '=', 'questions.question_id')
                ->select('answers.answer_content', 'answers.created_at', 'answers.updated_at', 'questions.question_title', 'questions.question_id')
                ->where('answers.answer_author', $id)
                ->get();
        return view('dashboard', compact('questions', 'answers'));
    }
}
