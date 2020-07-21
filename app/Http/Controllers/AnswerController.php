<?php

namespace GonnaSolve\Http\Controllers;

use Illuminate\Http\Request;
use GonnaSolve\Answer;

class AnswerController extends Controller
{
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
