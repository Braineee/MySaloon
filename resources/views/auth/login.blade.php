@extends('layouts.app')

@section('content')
<body id="LoginForm">
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
            <h2>Adam & Eve Beauty Saloon</h2>
            <br>
            </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="inputEmail" class="label">Username</label>
                        <input 
                            type="email" 
                            name="email" 
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                            id="inputEmail" 
                            placeholder="Email Address" 
                        required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="inputPassword" class="label">Password</label>
                        <input 
                            type="password" 
                            name="password" 
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                            id="inputPassword" 
                            placeholder="Password" 
                        required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input 
                                class="form-check-input text" 
                                type="checkbox" 
                                name="remember" 
                                id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="forgot">
                        <!--a href="reset.html">Forgot password?</a-->
                    </div>

                    <button type="submit" class="btn btn-primary"><b>SIGN IN</b></button>

                </form>
            </div>
        </div>
    </div>
</body>

@endsection
