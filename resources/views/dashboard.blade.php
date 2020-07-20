@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Edit Profile</div>
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
            console.log(data);  
            $('#pageModalContent').html('');    
            $('#pageModalContent').html(data); // load response 
        })
        .fail(function(){
            $('#pageModalContent').html('Something went wrong, Please try again...');
        });

    });

});
@endsection