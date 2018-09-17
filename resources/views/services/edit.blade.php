@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Saloon Service</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>
<!--
    table starts here
-->
<div>
    <form method="POST" action="{{ route('services.update', [$service->id]) }}">
        @csrf

        <!-- input for full name -->
        <div class="form-group">
            <label for="service_type" class="label">Service Type</label>
            <input 
                type="text" 
                name="service_type"
                id="service_type" 
                class="form-control{{ $errors->has('service') ? ' is-invalid' : '' }}" 
                placeholder="Enter service type here" 
                value = "{{ $service->service_type }}"
            required>
            @if ($errors->has('role'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('service_type') }}</strong>
                </span>
            @endif
        </div>

        <!-- input for full name -->
        <div class="form-group">
            <label for="service_percentage" class="label">Service Percentage</label>
            <input 
                type="text" 
                name="service_percentage"
                id="service_percentage" 
                class="form-control{{ $errors->has('service') ? ' is-invalid' : '' }}" 
                placeholder="Enter service type here" 
                value = "{{ $service->service_percentage }}"
            required>
            @if ($errors->has('service_percentage'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('service_percentage') }}</strong>
                </span>
            @endif
        </div>

        <br>
        <button type="submit" class="btn btn-primary"><b>SAVE</b></button>
        <input type="hidden" name="_method" value="PUT">

    </form>
</div>
@endsection