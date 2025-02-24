@extends('frontend.layouts.app')

@section('title', 'Search')

@section('content')
    <section class="sign-area">
        <div class="container">
            <div class="forms">
                <div class="form login row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="font-semibold title">Login </h2>
                        </div>
                    </div>
                    <div class="col-md-6 form-content">
                        <form class="mt-0" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="field input-field">
                                {{-- <input type="email" placeholder="Email" class="input"> --}}
                                <input type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Enter Email Address">
                                @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>

                            <div class="field input-field">
                                {{-- <input type="password" placeholder="Password" class="password"> --}}
                                <input type="password"class="password @error('password') is-invalid @enderror" name="password" required placeholder="Password">
                                <i class="fa  fa-eye-slash eye-icon"></i>
                            </div>

                            <div class="form-link">
                                <a href="{{route('password.request')}}" class="forgot-pass">Forgot password?</a>
                            </div>

                            <div class="field button-field">
                                <button class="btn btn-primary btn-user btn-block">Login</button>
                            </div>
                        </form>

                        <div class="form-link">
                            <span>Don't have an account? <a href="{{ route('register') }}" class="">Signup</a></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="media-options">
                            <a href="#" class="field facebook">
                                <i class="fab fa-facebook-f facebook-icon"></i>
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
