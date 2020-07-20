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
                    <h6>User 1 (Tanggal) (Jam)s</h6>
                    <div class="card-header">Jawaban dari user tentang soal</div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justifiy-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Answer</div>
                <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <textarea class="form-control" name="Answer" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger">Add Answer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection