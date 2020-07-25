@extends('layouts.master')

@section('body')
    <div class="full-height d-flex align-items-center" style="background-image: url({{ asset('img/welcome.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center;">
        <div class="row mx-auto">
            <div class="col-12 container">
                <div class="card border-0 shadow">
                    <div class="card-body text-center">
                        <p class="display-4 text-danger">GonnaSolve</p>
                        <p class="h5">Are you gonna stuck with a problem? Let's gonna solve!</p>
                        <div class="row my-4 py-4">
                            <div class="col-6 border-right">
                                <p class="text-muted">Ready to solve? login here!</p>
                                <a href="{{ route('login') }}" class="btn btn-lg btn-danger">Login</a>
                            </div>
                            <div class="col-6">
                                <p class="text-muted">New user? register here!</p>
                                <a href="{{ route('register') }}" class="btn btn-lg btn-danger">Register</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <p class="text-muted mb-0">GonnaSolve is an online forum that adopt between Quora and StackOverflow concept.</p>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</body>
@endsection
