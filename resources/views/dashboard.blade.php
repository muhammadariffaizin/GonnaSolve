@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow mb-4">
                <div class="card-header bg-danger border-0 text-light">Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="h3 font-weight-bold mb-1">{{ Auth::user()->name }}</p>
                    <blockquote class="blockquote">
                        <p class="mb-0">{{ Auth::user()->description }}</p>
                        <footer class="blockquote-footer">{{ Auth::user()->email }}</footer>
                    </blockquote>
                    <a href="#" id="profile_edit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#pageModal" data-url="{{ route('profile.edit',['id'=>Auth::user()->id])}}">{{ __('Edit Profile') }}</a>
                </div>
            </div>
            <div class="card border-0 shadow mb-4">
                <div class="card-header bg-danger border-0 text-light">Questions</div>

                <div class="card-body">
                    @if($questions->total() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($questions as $key => $question)
                                <div class="list-group-item d-flex">
                                    <div class="d-flex align-items-center mr-3 text-center">
                                        <div>
                                            <h4 class="mb-0">{{ $question->answer->count() }}</h4>
                                            <p class="mb-0">answers</p>
                                        </div>
                                    </div>
                                    <div class="w-100">
                                        <div class="mb-3">
                                            <a href="{{ url('/question', $question->id) }}" class="card-title card-link h5"><b>{{ $question->question_title }}</b></a>
                                            <p class="card-text description-text">{{ $question->question_content }}</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 col-xl-4 text-muted">
                                                <small>Asked <br/>{{ $question->created_at }}</small>
                                            </div>
                                            @if($question->created_at != $question->updated_at)
                                                <div class="col-6 col-xl-4 text-muted">
                                                    <small>Edited <br/>{{ $question->updated_at }}</small>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if($questions->total() > 5)
                            <div class="row justify-content-center mt-4">{{ $questions->appends(request()->input())->links() }}</div>
                        @endif
                    @else 
                        <div class="row justify-content-center">
                            <div class="h5">No questions have been asked</div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card border-0 shadow mb-4">
                <div class="card-header bg-danger border-0 text-light">Answers</div>

                <div class="card-body">
                    @if($answers->total() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($answers as $key => $answer)
                            <div class="list-group-item">
                                <a href="{{ url('/question', $answer->question->id) }}" class="h5 font-weight-bold">{{ $answer->question->question_title }}</a>
                                <p>{{ $answer->answer_content }}</p>
                                <div class="row">
                                    <div class="col-6 col-xl-4 text-muted">
                                        <small>Answered <br/>{{ $answer->created_at }}</small>
                                    </div>
                                    @if($answer->created_at != $answer->updated_at)
                                        <div class="col-6 col-xl-4 text-muted">
                                            <small>Edited <br/>{{ $answer->updated_at }}</small>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @if($answers->total() > 5)
                            <div class="row justify-content-center mt-4">{{ $answers->appends(request()->input())->links() }}</div>
                        @endif
                    @else
                        <div class="row justify-content-center">
                            <div class="h5">No answers have been asked</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow">
                <div class="card-header bg-danger border-0 text-light">Summary</div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex flex-column">
                            <div class="display-4">{{ $questions->total() }}</div>
                            <p>questions asked</p>
                        </div>
                        <div class="list-group-item d-flex flex-column">
                            <div class="display-4">{{ $answers->total() }}</div>
                            <p>answers added</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
$(document).ready(function(){

    $(document).on('click', '#profile_edit', function(e){

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