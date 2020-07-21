<?php

namespace GonnaSolve;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'answer_content',
        'answer_author',
        'answer_status',
        'question_id'
    ];
}
