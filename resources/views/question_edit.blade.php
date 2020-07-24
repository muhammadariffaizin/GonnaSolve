<div class="modal-header bg-danger text-light border-0">
    <h5 class="modal-title">Edit Question</h5>
    <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" class="text-light">&times;</span>
    </button>
</div>
<form action="{{ route('question.update') }}" method="POST" class="form">
    @csrf
    <div class="modal-body">
        <input type="text" name="id" value="{{ $question->id }}" hidden>
        <div class="form-group row">
            <label for="question_title" class="col-md-4 col-form-label text-md-right">{{ __('Question Title') }}</label>

            <div class="col-md-6">
                <input id="question_title" type="text" class="form-control @error('question_title') is-invalid @enderror" name="question_title"
                    value="{{ $question->question_title }}" required autofocus>

                @error('question_title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="question_content" class="col-md-4 col-form-label text-md-right">{{ __('Question Description') }}</label>

            <div class="col-md-6">
                <input id="question_content" type="text" class="form-control @error('question_content') is-invalid @enderror" name="question_content"
                    value="{{ $question->question_content }}" required autofocus>

                @error('question_content')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger">Save Changes</button>
        </div>
    </div>
</form>