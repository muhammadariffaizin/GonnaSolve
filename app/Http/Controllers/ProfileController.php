<?php

namespace GonnaSolve\Http\Controllers;

use GonnaSolve\User;
use GonnaSolve\Question;
use GonnaSolve\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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

    public function index()
    {
        $id = Auth::user()->id;
        
        $questions = Question::where('question_author', $id)
                    ->paginate(5, ['*'], 'question');
        $answers = Answer::where('answer_author', $id)
                    ->paginate(5, ['*'], 'answer');
        return view('dashboard', compact('questions', 'answers'));
    }

    public function edit() {
        return view('profile_edit');
    }

    public function update(Request $request) {
        User::where('id', $request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'email' => $request->email,
        ]);
        return redirect()->route('dashboard');
    }
}
