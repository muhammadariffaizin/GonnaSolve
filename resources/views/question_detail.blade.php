@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card border-0 shadow">
                <div class="card-header bg-danger border-0 text-light">
                    <p class="mb-0">{{ $question->user->name }}</p>
                    <small class="card-text">{{ $question->user->description }}</small>
                </div>
                <div class="card-body">
                    <a href="{{ url('/question', $question->id) }}" class="h3 card-title card-link">{{ $question->question_title }}</a>
                    <p class="card-text mt-3">{{ $question->question_content }}</p>
                    <div class="mb-3">
                        @if(Auth::check() && Auth::user()->id == $question->question_author) 
                            <a href="#" id="editQuestion" class="btn btn-sm btn-link text-danger" data-toggle="modal" data-target="#pageModal" data-url="{{ route('question.edit',['id'=>$question->id])}}">{{ __('Edit') }}</a>
                            <a href="{{ route('question.delete', ['id'=>$question->id]) }}" id="deleteQuestion" class="btn btn-sm btn-link text-danger">{{ __('Delete') }}</a>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-6 col-lg-4">
                            <small>
                                <span class="text-muted">Asked <br/>{{ $question->created_at }}</span>
                            </small>
                        </div>
                        @if($question->created_at != $question->updated_at)
                            <div class="col-6 col-lg-4">
                                <small>
                                    <span class="text-muted">Edited <br/>{{ $question->updated_at }}</span>
                                </small>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card border-0 shadow">
                <div class="card-header bg-danger border-0 text-light">Answer</div>
                <div class="card-body">
                    @if($answers->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($answers as $key => $answer)
                            <div class="list-group-item">
                                <p>{{ $answer->answer_content }}</p>
                                <div class="mb-3">
                                    @if(Auth::check() && Auth::user()->id == $answer->answer_author) 
                                        <a href="#" id="editAnswer" class="btn btn-sm btn-link text-danger" data-toggle="modal" data-target="#pageModal" data-url="{{ route('answer.edit',['id'=>$answer->id])}}">{{ __('Edit') }}</a>
                                        <a href="{{ route('answer.delete', ['id'=>$answer->id]) }}" id="deleteAnswer" class="btn btn-sm btn-link text-danger">{{ __('Delete') }}</a>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-6 col-lg-4">
                                        <p><b>{{ $answer->user->name }}</b></p>
                                    </div>
                                    @if($answer->created_at == $answer->updated_at)
                                        <div class="col-6 col-lg-4">
                                            <small>
                                                <span class="text-muted">Answered <br/>{{ $answer->created_at }}</span>
                                            </small>
                                        </div>
                                    @else
                                        <div class="col-6 col-lg-4">
                                            <small>
                                                <span class="text-muted">Edited <br/>{{ $answer->updated_at }}</span>
                                            </small>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="row justify-content-center">
                            <div class="h5">No answers</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow">
                <div class="card-header bg-danger border-0 text-light">Your Answer</div>
                <div class="card-body">
                    @auth
                        <form action="{{ route('answer.create') }}" method="POST" class="form">
                            @csrf
                            <input type="text" name="AnswerAuthor" value="{{ Auth::user()->id }}" hidden>
                            <input type="text" name="QuestionId" value="{{ $question->id }}" hidden>
                            <div class="form-group">
                                <textarea class="form-control" name="AnswerContent" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-danger">Add Answer</button>
                        </form>
                    @else
                        <p>Please sign up and login before add an answer</p>
                        <a href="{{ route('register') }}" class="btn btn-danger">Sign Up</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection

@section('scripts')
$(document).ready(function(){

    $(document).on('click', '#editAnswer, #editQuestion', function(e){

        e.preventDefault();

        var url = $(this).data('url');

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html'
        })
        .done(function(data){
            $('#pageModalContent').html('');    
            $('#pageModalContent').html(data); // load response 
        })
        .fail(function(){
            $('#pageModalContent').html('Something went wrong, Please try again...');
        });

    });

});
@endsection