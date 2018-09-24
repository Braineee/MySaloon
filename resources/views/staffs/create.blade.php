@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Saloon Staff</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>
<!--
    table starts here
-->
<div>
    <div class="avatar avatar_round align-center">
        <label for="house_picture" style="color:#f00;">
            click the avatar to upload picture <br>
            <img src="{{ asset('img/avatar.png') }}" id="display_" width="200px" alt="" />
        </label>
        <br>
    </div>
    <form method="POST" action="{{ route('staffs.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- input for image -->
        <input type="file" style="display:none;" id="house_picture" name="image"/> 

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

        <!-- input for Gender -->
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
            @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
        </div>

        <!-- input for role -->
        <div class="form-group">
            <label for="role" class="label">Role</label>
            <select 
                name="role" 
                id="role" 
                class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" 
                required>
                <option value="">Select staff role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->role }}</option>
                @endforeach
            </select>
            @if ($errors->has('role'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('role') }}</strong>
                </span>
            @endif
        </div>

        <br>
        <button type="submit" class="btn btn-primary"><b>CREATE STAFF</b></button>

    </form>
</div>
@endsection