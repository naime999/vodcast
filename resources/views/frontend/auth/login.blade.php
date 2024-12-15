@extends('frontend.layouts.app')

@section('title', 'Search')

@section('content')
    {{-- <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                placeholder="Enter Email Address.">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input id="password" type="password"
                class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required
                autocomplete="current-password" placeholder="Password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox small">
                <input class="custom-control-input" type="checkbox" name="remember" id="customCheck"
                    {{ old('remember') ? 'checked' : '' }}>

                <label class="custom-control-label" for="customCheck">Remember Me</label>
            </div>
        </div>
        <button class="btn btn-primary btn-user btn-block">Login</button>
    </form> --}}
    <section class="sign-area">
        <div class="container">
            <div class="forms">
                <div class="form login">
                    <div class="form-content">
                        <div class="section-title">
                            <h2 class="font-semibold title">Login </h2>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
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
                            <span>Don't have an account? <a href="#" class="link signup-link">Signup</a></span>
                        </div>
                    </div>

                    <div class="line"></div>

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

                <!-- Signup Form -->

                <div class="form signup">
                    <div class="form-content">
                        <div class="section-title">
                            <h2 class="font-semibold title">Signup </h2>
                        </div>
                        <form action="#">
                            <div class="field input-field">
                                <input type="email" placeholder="Email" class="input">
                            </div>

                            <div class="field input-field">
                                <input type="password" placeholder="Create password" class="password">
                            </div>

                            <div class="field input-field">
                                <input type="password" placeholder="Confirm password" class="password">
                                <i class="fa fa-eye-slash eye-icon"></i>
                            </div>

                            <div class="field button-field">
                                <button>Signup</button>
                            </div>
                        </form>

                        <div class="form-link">
                            <span>Already have an account? <a href="#" class="link login-link">Login</a></span>
                        </div>
                    </div>

                    <div class="line"></div>

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
