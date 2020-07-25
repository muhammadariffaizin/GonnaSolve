@extends('layouts.app')

@section('modal-action')
{{ route('question.create') }}
@endsection

@section('modal-title')
Add Question
@endsection

@section('modal-content')
<div class="alert alert-info border-0 shadow" role="alert">
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
    <input class="form-control" id="addQuestionInput" name="QuestionTitle"
        placeholder="Be specific and imagine you're asking a question to another person">
</div>
<div class="form-group">
    <label for="addQuestionTextArea">Question Description</label>
    <textarea class="form-control" id="addQuestionTextArea" name="QuestionDescription" rows="3"
        placeholder="Explain all the information that someone would need to answer your question"></textarea>
</div>
@endsection

@section('modal-footer')
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
<button type="submit" class="btn btn-danger">Add Question</button>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="row sticky-top sticky-offset">
            <div class="card w-100 border-0 shadow">
                <div class="card-body">
                    <h5 class="card-title">Hi {{ Auth::check() ? Auth::user()->name : 'You'}}!</h5>
                    <p class="card-text">Ask your question here!</p>
                    @if (Auth::check())
                    <a href="#" class="btn btn-danger" data-toggle="modal"
                        data-target="#pageModal">{{ __('Ask Question') }}</a>
                    @else
                    <a href="{{ route('register') }}" class="btn btn-danger">{{ __('Sign Up') }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9 mt-4 mt-md-0">
        <p class="h3 border-bottom pb-2">Latest Answers</p>
        <p class="h6 mb-4">Showing {{ $answers->firstItem() }} - {{ $answers->lastItem() }} from {{ $answers->total() }}
            answers</p>
        @foreach($answers as $key => $answer)
        <div class="card my-3 shadow border-danger">
            <div class="card-body">
                <div class="border-bottom pb-3 mb-3">
                    <a href="{{ url('/question', $answer->question->id) }}"
                        class="h3 font-weight-bold description-text card-link mb-1">{{ $answer->question->question_title }}</a>
                </div>
                <div class="mt-4">
                    <p class="description-text">{{ $answer->answer_content }}</p>
                    <div class="row">
                        <div class="col-6 col-lg-4">
                            <span class="align-middle"><b>{{ $answer->user->name }}</b></span>
                        </div>
                        @if($answer->created_at == $answer->updated_at)
                            <div class="col-6 col-lg-4">
                                <small>Answered <br/>{{ $answer->created_at }}</small>
                            </div>
                        @else
                            <div class="col-6 col-lg-4">
                                <small>Edited <br/>{{ $answer->updated_at }}</small>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="row justify-content-center mt-4">{{ $answers->links() }}</div>
    </div>
</div>

@endsection