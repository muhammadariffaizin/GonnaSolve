@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <p class="mb-0">{{ $question[0]->name }} | Programming</p>
                    <small class="card-text">{{ $question[0]->description }}</small>
                </div>
                <div class="card-body">
                    <h3>{{ $question[0]->question_title }}</h3>
                    <p>{{ $question[0]->question_content }}</p>
                    <div>
                        <small>
                            <span>Created {{ $question[0]->created_at }}</span> |
                            <span>Edited {{ $question[0]->updated_at }}</span>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Answer</div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        @foreach($answers as $key => $answer)
                        <div class="list-group-item">
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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Answer</div>
                <div class="card-body">
                    @auth
                        <form action="{{ route('createAnswer') }}" method="POST" class="form">
                            @csrf
                            <input type="text" name="AnswerAuthor" value="{{ Auth::user()->id }}" hidden>
                            <input type="text" name="QuestionId" value="{{ $question[0]->question_id }}" hidden>
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