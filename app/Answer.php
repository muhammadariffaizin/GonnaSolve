<?php

namespace GonnaSolve;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';

    protected $fillable = [
        'answer_content',
        'answer_author',
        'answer_status',
        'question_id'
    ];

    public function user() {
        return $this->belongsTo('GonnaSolve\User', 'answer_author');
    }

    public function question() {
        return $this->belongsTo('GonnaSolve\Question');
    }
}
