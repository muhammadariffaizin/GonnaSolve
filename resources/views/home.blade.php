@extends('layouts.app')

@section('modal-action') 
    {{ route('createQuestion') }}
@endsection

@section('modal-title')
    Add Question
@endsection

@section('modal-content')
    <div class="alert alert-info" role="alert">
        <h4 class="alert-heading">Tips on getting good answers quickly</h4>
        <ul>
            <li>Make sure your question has not been asked already</li>
            <li>Keep your question short and to the point</li>
            <li>Double-check grammar and spelling</li>
        </ul>
    </div>
    <input type="text" name="QuestionAuthor" value="{{ Auth::check() ? Auth::user()->id : ''}}" hidden>
    <div class="form-group">
        <label for="addQuestionInput">Question Title</label>
        <input class="form-control" id="addQuestionInput" name="QuestionTitle" placeholder="Be specific and imagine you're asking a question to another person">
    </div>
    <div class="form-group">
        <label for="addQuestionTextArea">Question Description</label>
        <textarea class="form-control" id="addQuestionTextArea" name="QuestionDescription" rows="3" placeholder="Explain all the information that someone would need to answer your question"></textarea>
    </div>
@endsection

@section('modal-footer')
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    <button type="submit" class="btn btn-danger">Add Question</button>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="list-group sticky-top sticky-offset">
            <a href="#" class="list-group-item list-group-item-action list-group-item-danger active">All
                Topics</a>
            <a href="#" class="list-group-item list-group-item-action">Technology</a>
            <a href="#" class="list-group-item list-group-item-action">Social</a>
            <a href="#" class="list-group-item list-group-item-action">Politics</a>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        @foreach($questions as $key => $question)
            <div class="card mb-4">
                <div class="card-header">
                    <p class="mb-0">{{ $question->name }} | Programming</p>
                    <small class="card-text">{{ $question->description }}</small>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="d-flex align-items-center mr-3 text-center">
                            <div>
                                <h4 class="mb-0">{{ $question->count_answer ? $question->count_answer : '0' }}</h4>
                                <p class="mb-0">answers</p>
                            </div>
                        </div>
                        <div>
                            <a href="{{ url('/question', $question->question_id) }}" class="card-title card-link h5"><b>{{ $question->question_title }}</b></a>
                            <p class="card-text description-text">{{ $question->question_content }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <small>
                        <span>Created {{ $question->created_at }}</span> |
                        <span>Edited {{ $question->updated_at }}</span>
                    </small>
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-md-3 mb-4">
        <div class="card sticky-top sticky-offset">
            <div class="card-body">
                <h5 class="card-title">Hi {{ Auth::check() ? Auth::user()->name : 'You'}}!</h5>
                <p class="card-text">Ask your question here!</p>
                @if (Auth::check()) 
                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#pageModal">{{ __('Add Question') }}</a>
                @else 
                    <a href="{{ route('register') }}" class="btn btn-danger">{{ __('Sign Up') }}</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection