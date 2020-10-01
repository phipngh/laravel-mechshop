

<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

    <div class="form-group row">
        <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6 offset-md-4">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
    </label>
</div>
</div>
</div>

<div class="form-group row mb-0">
<div class="col-md-8 offset-md-4">
<button type="submit" class="btn btn-primary">
{{ __('Login') }}
    </button>

    <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
    </a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>


-->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>


    {{Html::style('admin/assets/vendor/simple-line-icons/css/simple-line-icons.css')}}
    {{Html::style('admin/assets/vendor/font-awesome/css/fontawesome-all.min.css')}}
    {{Html::style('admin/assets/css/styles.css')}}
</head>
<body>
<div class="page-wrapper flex-row align-items-center">
    @yield('content')
</div>

{{Html::script('admin/assets/vendor/jquery/jquery.min.js')}}
{{Html::script('admin/assets/vendor/popper.js/popper.min.js')}}
{{Html::script('admin/assets/vendor/bootstrap/js/bootstrap.min.js')}}
{{Html::script('admin/assets/vendor/chart.js/chart.min.js')}}
{{Html::script('admin/assets/js/carbon.js')}}
{{Html::script('admin/assets/js/demo.js')}}

</body>
</html>

