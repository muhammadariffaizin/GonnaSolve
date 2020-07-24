<?php

namespace GonnaSolve;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'question_title', 
        'question_content', 
        'question_author', 
        'question_status',
        'topic_id'
    ];

    public function user() {
        return $this->belongsTo('GonnaSolve\User', 'question_author');
    }

    public function answer() {
        return $this->hasMany('GonnaSolve\Answer');
    }
}