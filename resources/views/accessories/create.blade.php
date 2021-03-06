@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Saloon Accessory</h1>
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
    <form method="POST" action="{{ route('accessories.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- input for image -->
        <input type="file" style="display:none;" id="house_picture" name="image"/> 

        <!-- input for name -->
        <div class="form-group">
            <label for="name" class="label">Accessory Name</label>
            <input 
                type="name" 
                name="name"
                id="name" 
                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                placeholder="Enter accessory name here" 
            required>
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
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

        <!-- input for quantity -->
        <div class="form-group">
            <label for="quantity" class="label">quantity</label>
            <input 
                type="number" 
                name="quantity"
                id="quantity" 
                class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" 
                placeholder="Enter your quantity here" 
            required>
            @if ($errors->has('quantity'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('quantity') }}</strong>
                </span>
            @endif
        </div>
    

        <br>
        <button type="submit" class="btn btn-primary"><b>CREATE ACCESSORY</b></button>

    </form>
</div>
@endsection