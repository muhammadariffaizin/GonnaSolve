<?php

namespace GonnaSolve\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use GonnaSolve\Question;
use GonnaSolve\Answer;

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
        
        $questions = Question::where('question_author', $id)
                    ->paginate(5, ['*'], 'question');
        $answers = Answer::where('answer_author', $id)
                    ->paginate(5, ['*'], 'answer');
        return view('dashboard', compact('questions', 'answers'));
    }
}
