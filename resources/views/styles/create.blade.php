@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Saloon Style</h1>
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
            <img src="{{ asset('img/airstyle.png') }}" id="display_" width="200px" alt="" />
        </label>
        <br>
    </div>
    <form method="POST" action="{{ route('styles.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- input for image -->
        <input type="file" style="display:none;" id="house_picture" name="image"/> 

        <!-- input for full name -->
        <div class="form-group">
            <label for="name" class="label">Style Name</label>
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

        <!-- input for duraation -->
        <div class="form-group">
            <label for="duration" class="label">Duration in (Minutes)</label>
            <input 
                type="duration" 
                name="duration"
                id="duration" 
                class="form-control{{ $errors->has('duration') ? ' is-invalid' : '' }}" 
                placeholder="Enter duration here" 
            required>
            @if ($errors->has('duration'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('duration') }}</strong>
                </span>
            @endif
        </div>
        
        <!-- input for Price -->
        <div class="form-group">
            <label for="price" class="label">Price</label>
            <input 
                type="number" 
                name="price"
                id="price" 
                class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" 
                placeholder="Enter your price here" 
            required>
            @if ($errors->has('price'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>

        <br>
        <button type="submit" class="btn btn-primary"><b>CREATE STYLE</b></button>

    </form>
</div>
@endsection