@extends('layouts.app')

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
    <div class="col-3">
        <div class="row sticky-top sticky-offset">
            <div class="list-group w-100">
                <a href="#" class="list-group-item list-group-item-action list-group-item-danger active">All
                    Topics</a>
                <a href="#" class="list-group-item list-group-item-action">Technology</a>
                <a href="#" class="list-group-item list-group-item-action">Social</a>
                <a href="#" class="list-group-item list-group-item-action">Politics</a>
            </div>
            <div class="card mt-4">
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
    <div class="col-9">
        <div class="card">
            <div class="card-header h4 pt-3">Top Question</div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    @foreach($answers as $key => $answer)
                    <div class="list-group-item">
                    <a href="{{ url('/question', $answer->question_id) }}" class="h5 font-weight-bold">{{ $answer->question_title }}</a>
                        <p>{{ $answer->answer_content }}</p>
                        <div>
                            <small>
                                <span>{{ $answer->name }}</span> |
                                <span>Created {{ $answer->created_at }}</span> |
                                <span>Edited {{ $answer->updated_at }}</span>
                            </small>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection