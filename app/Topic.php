<?php

namespace GonnaSolve;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'topic_id',
        'topic_name',
        'topic_description',
        'created_at',
        'updated_at'
    ];
}
