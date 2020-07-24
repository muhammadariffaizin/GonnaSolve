<div class="modal-header bg-danger text-light border-0">
    <h5 class="modal-title">Edit Profile</h5>
    <button type="button" class="close bg-danger" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" class="text-light">&times;</span>
    </button>
</div>
<form action="{{ route('profile.update') }}" method="POST" class="form">
    @csrf
    <div class="modal-body">
        <input type="text" name="id" value="{{ Auth::check() ? Auth::user()->id : ''}}" hidden>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Profile Description') }}</label>

            <div class="col-md-6">
                <input id="description" type="text" class="form-control" name="description" value="{{ Auth::user()->description }}"
                    autocomplete="description">
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ Auth::user()->email }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger">Save Changes</button>
    </div>
</form>