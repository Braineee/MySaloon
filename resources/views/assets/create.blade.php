@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Saloon Asset</h1>
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
            <img src="{{ asset('img/box.png') }}" id="display_" width="200px" alt="" />
        </label>
        <br>
    </div>
    <form method="POST" action="{{ route('assets.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- input for image -->
        <input type="file" style="display:none;" id="house_picture" name="image"/> 

        <!-- input for full name -->
        <div class="form-group">
            <label for="name" class="label">Asset Name</label>
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

        <!-- input for location -->
        <div class="form-group">
            <label for="location" class="label">Location of asset</label>
            <select 
                name="location" 
                id="location" 
                class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" 
                required>
                <option value="">Select location of asset</option>
                <option value="SALOON">Saloon</option>
                <option value="STORE">Store</option>
                <option value="REPAIR">Repair</option>
            </select>
            @if ($errors->has('location'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('location') }}</strong>
                </span>
            @endif
        </div>

        <!-- input for status -->
        <div class="form-group">
            <label for="status" class="label">Status of asset</label>
            <select 
                name="status" 
                id="status" 
                class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" 
                required>
                <option value="">Select status of asset</option>
                <option value="Working Condition">Working Condition</option>
                <option value="Needs Maintainance">Needs Maintainance</option>
                <option value="Needs Repair">Needs Repair</option>
                <option value="Needs Replacement">Needs Replacement</option>
                <option value="Damaged">Damaged</option>
                <option value="Expired">Expired</option>
            </select>
            @if ($errors->has('status'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('status') }}</strong>
                </span>
            @endif
        </div>
        

        <br>
        <button type="submit" class="btn btn-primary"><b>CREATE ASSET</b></button>

    </form>
</div>
@endsection