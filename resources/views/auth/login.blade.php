<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-login">
        <div style="background: rgba(24, 29, 56, .7);">
            <div id="layoutAuthentication">
                <div id="layoutAuthentication_content">
                    <main>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="mt-8 col-lg-5">
                                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                                            <div class="bg-dark text-light card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                            <div class="bg-dark text-light card-body">
                                                <form>
                                                    <div class="form-floating mb-3">
                                                        <input id="email" type="email" class="bg-dark text-light form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="example@email.com">
                                                        <label for="email">Email address</label>

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input id="password" type="password" class="bg-dark text-light  form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">
                                                        <label for="inputPassword">Password</label>
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                        @if (Route::has('password.request'))
                                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                                {{ __('Forgot Your Password?') }}
                                                            </a>
                                                        @endif
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Login') }}
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </main>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
    </body>
</html>