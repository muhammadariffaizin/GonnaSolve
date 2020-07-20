@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">Profile</div>

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
                    <a href="#" id="editProfile" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#pageModal" data-url="{{ route('editProfile',['id'=>Auth::user()->id])}}">{{ __('Edit Profile') }}</a>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">Questions</div>

                <div class="card-body">
                    @foreach($questions as $key => $question)
                        <div class="d-flex flex-row p-3 border-bottom">
                            <div class="d-flex align-items-center mr-3 text-center">
                                <div>
                                    <h4 class="mb-0">24</h4>
                                    <p>answers</p>
                                </div>
                            </div>
                            <div>
                                <a href="{{ url('/question', $question->question_id) }}" class="card-title card-link h5"><b>{{ $question->question_title }}</b></a>
                                <p class="card-text description-text">{{ $question->question_content }}</p>
                            </div>
                        </div>
                        <div class="divider"></div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Summary</div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
$(document).ready(function(){

    $(document).on('click', '#editProfile', function(e){

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