@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <p class="h3 border-bottom pb-2">Search Results</p>
        @if ($questions->total() > 0)
            <p class="h5 mb-4">Showing {{ $questions->firstItem() }} - {{ $questions->lastItem() }} from {{ $questions->total() }} questions</p>
            @foreach($questions as $key => $question)
                <div class="card border-0 shadow mb-4">
                    <div class="card-header bg-danger border-0 text-light">
                        <p class="mb-0">{{ $question->user->name }}</p>
                        <small class="card-text">{{ $question->user->description }}</small>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="d-flex align-items-center mr-3 text-center">
                                <div>
                                    <h4 class="mb-0">{{ $question->answer->count() }}</h4>
                                    <p class="mb-0">answers</p>
                                </div>
                            </div>
                            <div>
                                <a href="{{ url('/question', $question->id) }}" class="card-title card-link h5 description-text"><b>{{ $question->question_title }}</b></a>
                                <p class="card-text description-text">{{ $question->question_content }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                    <div class="row">
                        <div class="col-6 col-lg-4 text-muted">
                            <small>Asked <br/>{{ $question->created_at }}</small>
                        </div>
                        @if($question->created_at != $question->updated_at)
                            <div class="col-6 col-lg-4 text-muted">
                                <small>Edited <br/>{{ $question->updated_at }}</small>
                            </div>
                        @endif
                    </div>
                </div>
                </div>
            @endforeach
            @if ($questions->total() > 10)
                <div class="row justify-content-center mt-4">{{ $questions->appends(request()->input())->links() }}</div>
            @endif
        @else
            <p class="h5">No matched questions</p>

        @endif
    </div>
</div>
@endsection