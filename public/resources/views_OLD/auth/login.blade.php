<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard - Freeze CRM</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        {{-- <link rel="stylesheet" href="assets/css/fontawesome.min.css"> --}}
        {{-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> --}}
        <link rel="stylesheet" href="{!! asset('css/fontawesome.min.css')!!}">
        <link rel="stylesheet"  href="{!! asset('css/bootstrap.min.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/Freeze_2.0.css') !!}">
    </head>
    <body class="login-page">
    <div class="wrapper">
            <main class="login-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="log">
                                    <img src="{!! asset('images/Light blue_Freeze_whitepng.png')!!}" alt="Freeze Logo" class="img-fluid" width="230" /> 
                                </div>
                                <h1>Welcome Back</h1>
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
                                <div class="float-right">
                                <input type="submit" class="btn btn-outline login-btn" style="background: transparent;border: 1px solid #fff;" value=" LOG IN">
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>