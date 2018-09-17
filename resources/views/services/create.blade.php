@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Saloon Services</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>
<!--
    table starts here
-->
<div>
    <form method="POST" action="{{ route('services.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- input for service type -->
        <div class="form-group">
            <label for="service_type" class="label">Service Type</label>
            <input 
                type="service_type" 
                name="service_type"
                id="service_type" 
                class="form-control{{ $errors->has('service_type') ? ' is-invalid' : '' }}" 
                placeholder="Enter service type here" 
            required>
            @if ($errors->has('service_type'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('service_type') }}</strong>
                </span>
            @endif
        </div>

        <!-- input for service type -->
        <div class="form-group">
            <label for="service_percentage" class="label">Service Percentage</label>
            <input 
                type="service_percentage" 
                name="service_percentage"
                id="service_percentage" 
                class="form-control{{ $errors->has('service_percentage') ? ' is-invalid' : '' }}" 
                placeholder="Enter service type here" 
            required>
            @if ($errors->has('role'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('role') }}</strong>
                </span>
            @endif
        </div>

        <br>
        <button type="submit" class="btn btn-primary"><b>CREATE SERVICE</b></button>

    </form>
</div>
@endsection