<?php

namespace GonnaSolve\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GonnaSolve\Answer;
use GonnaSolve\Question;

class AnswerController extends Controller
{
    public function index() {
        $answers = Answer::orderBy('answers.updated_at', 'DESC')
                    ->paginate(10);
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

    public function edit($id) {
        $answer = Answer::where('id', $id)
                    ->first();
        return view('answer_edit', compact('answer'));
    }

    public function update(Request $request) {
        Answer::where('id', $request->id)->update([
            'answer_content' => $request->answer_content,
        ]);
        return redirect()->route('question.show_detail', ['id'=>$request->question_id]);
    } 

    public function delete($id) {
        $answer = Answer::where('id', $id);
        $question_id = Answer::select('question_id')->where('id', $id)->first(); 
        $answer->delete(); 

        return redirect()->back();
    }
}
