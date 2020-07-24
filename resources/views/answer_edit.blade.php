<div class="modal-header bg-danger text-light border-0">
    <h5 class="modal-title">Edit Answer</h5>
    <button type="button" class="close bg-danger" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" class="text-light">&times;</span>
    </button>
</div>
<form action="{{ route('answer.update') }}" method="POST" class="form">
    @csrf
    <div class="modal-body">
        <input type="text" name="id" value="{{ $answer->id }}" hidden>
        <input type="text" name="question_id" value="{{ $answer->question_id }}" hidden>
        <div class="form-group row">
            <label for="answer_content" class="col-md-4 col-form-label text-md-right">{{ __('Edit Answer') }}</label>

            <div class="col-md-6">
                <input id="answer_content" type="text" class="form-control @error('answer_content') is-invalid @enderror" name="answer_content"
                    value="{{ $answer->answer_content }}" required autofocus>

                @error('answer_content')
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