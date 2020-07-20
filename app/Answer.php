<?php

namespace GonnaSolve;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'answer_id',
        'answer_content',
        'answer_author',
        'answer_status',
        'discuss_id',
        'created_at',
        'updated_at'
    ];
}
