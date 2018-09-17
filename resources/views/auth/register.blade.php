@extends('layouts.app')

@section('content')
<body id="LoginForm">
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
            <h2>Adam & Eve Beauty Saloon</h2>
            <h5>Register Here</h5>
            <br>
            </div>
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- input for full name -->
                    <div class="form-group">
                        <label for="name" class="label">Full Name</label>
                        <input 
                            type="name" 
                            name="name"
                            id="name" 
                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                            placeholder="Enter your full name here" 
                        required>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- input for sex -->
                    <div class="form-group">
                        <label for="sex" class="label">Gender</label>
                        <select 
                            name="sex" 
                            id="sex" 
                            class="form-control{{ $errors->has('sex') ? ' is-invalid' : '' }}" 
                            required>
                            <option value="">Select your gender</option>
                            <option value="MALE">Male</option>
                            <option value="FEMALE">Female</option>
                        </select>
                        @if ($errors->has('sex'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('sex') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <!-- input for email -->
                    <div class="form-group">
                        <label for="email" class="label">Email</label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                            placeholder="Enter your email here" 
                        required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- input for phone -->
                    <div class="form-group">
                        <label for="phone" class="label">Phone</label>
                        <input 
                            type="phone" 
                            name="phone" 
                            id="phone" 
                            class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" 
                            placeholder="Enter your phone number here" 
                        required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- input for password -->
                    <div class="form-group">
                        <label for="password" class="label">Password</label>
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                            placeholder="Enter your password here" 
                        required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- input for confirm password -->
                    <div class="form-group">
                        <label for="password-confirm" class="label">Confirm Password</label>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            id="password-confirm" 
                            class="form-control" 
                            placeholder="Please enter your password again" 
                        required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary"><b>REGISTER</b></button>

                </form>
            </div>
        </div>
    </div>
</body>
@endsection
