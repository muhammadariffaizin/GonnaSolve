<?php

namespace GonnaSolve\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use GonnaSolve\Answer;
use GonnaSolve\Question;

class QuestionController extends Controller
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

    public function index() {
        $questions = Question::orderBy('questions.created_at', 'DESC')
                        ->paginate(10);
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

    public function edit($id) {
        $question = Question::where('id', $id)
                    ->first();
        return view('question_edit', compact('question'));
    }

    public function update(Request $request) {
        Question::where('id', $request->id)->update([
            'question_title' => $request->question_title,
            'question_content' => $request->question_content,
        ]);
        return redirect()->back();
    }

    public function delete($id) {
        $delete = Question::where('id', $id);
        $delete->delete();
        return redirect()->route('home');
    }
        
    public function show_detail_question($id) {
        $question = Question::where('id', $id)->first();
        $answers = Answer::where('question_id', $id)
                    ->orderBy('answers.updated_at', 'DESC')->get();
        return view('question_detail', compact('question', 'answers'));
    }

    public function search(Request $request) {
        $find = $request->search;
        $questions = Question::where('question_title', 'like', '%'.$find.'%')
                    ->orderBy('updated_at', 'DESC')
                    ->paginate(10);
        return view('search', compact('questions'));
    }
}
