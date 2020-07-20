<?php

namespace GonnaSolve;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question_title', 
        'question_content', 
        'question_author', 
        'question_status',
        'topic_id'
    ];
}