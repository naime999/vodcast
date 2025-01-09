@extends('frontend.layouts.app')

@section('title', 'Search')

@section('content')
    <section class="sign-area">
        <div class="container">
            <div class="form login row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="font-semibold title">Signup </h2>
                    </div>
                </div>
                <div class="col-md-6 form-content">
                    <form class="mt-0 row" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <input type="text" name="first_name" placeholder="First Name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}">
                            @error('first_name')
                                <span class="invalid-feedback fs-6" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="text" name="last_name" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}">
                            @error('last_name')
                                <span class="invalid-feedback fs-6" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="email" name="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback fs-6" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="password" name="password" placeholder="New password" class="form-control @error('password') is-invalid @enderror"  value="{{ old('password') }}">
                            @error('password')
                                <span class="invalid-feedback fs-6" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="password" name="password_confirmation" placeholder="Confirm password" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                                <span class="invalid-feedback fs-6" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="field button-field">
                            <button>Signup</button>
                        </div>
                    </form>
                    <div class="form-link">
                        <span>Already have an account? <a href="{{ route('login') }}" class="">Login</a></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="media-options">
                        <a href="#" class="field facebook">
                            <i class='bx bxl-facebook google-icon'></i>
                            <span>Login with Facebook</span>
                        </a>
                    </div>
                    <div class="media-options">
                        <a href="#" class="field google">
                            <i class='fab fa-google facebook-icon'></i>
                            <span>Login with Google</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('scripts')
    <script>
        var load = $('.loader-overlay');
        $(document).ready(function() {
            load.hide();
        });
    </script>
@endsection
