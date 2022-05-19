<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
        <title>Notes | Freeze</title>
        <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/login.css') !!}">
        
    </head>
    <body>
        <div class="wrapper">
            <!-- main content start -->
            <section class="main-login">
                <div class="inner-page">
                    <div class="text-center form-center">
                        <img
                            src="{!! asset('images/freeze_logo.png') !!}"
                            alt="logo"
                            width="125"
                            height="125"
                            style="margin-bottom:15px;">
                        <h2>Login</h2>
                        <form method="POST" action="{{ route('login') }}" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <input type="email" id="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="EMAIL" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="PASSWORD">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn" value="Go">
                            </div>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            <a href="#">I Forgot My Password</a>
                        </form>
                    </div>

                </div>
            </section>
        </div>

        <!-- main content end -->
        <script src="{!! asset('js/jquery-3.3.1.min.js') !!}"></script>
        <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
        <script src="{!! asset('js/general.js') !!}"></script>
    </body>
</html>