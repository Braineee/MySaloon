@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Booking for {{ $style->name }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    </div>
</div>
<!--
    table starts here
-->
<div class="row">
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
            <img class="card-img-top" src="/storage/styles/{{ $style->picture }}" alt="Card image cap">
            <div class="card-body">
                <span style="font-size:20px;">
                    <i class="fa fa-square"></i>&ensp;
                    {{ $style->name }}
                </span><br>
                <span style="font-size:20px;">
                    <i class="fa fa-square"></i>&ensp;
                    &#8358;{{ number_format("$style->price",2)  }}
                </span>
                <p class="card-text"><small style="color:#F00;"><strong>N:B</strong> Home Service attracts an extra fee, starting at {{ 5 }}% increase.</small></p>
                <div class="d-flex justify-content-between align-items-center">

                    <span  class="btn btn-sm btn-outline-danger">Booking {{ $style->name }}</span>

                    <small class="text-muted">{{ $style->duration }} mins</small>
                </div>
            </div>
        </div>
    </div>







    <div class="col-md-8">
        <div class="card mb-8 shadow-sm" style="padding:10px;">
            <form method="POST" action="{{ route('bookings.store') }}">
                @csrf
                
                <!-- input for style_id -->
                <input type="hidden" value="{{ $style->id }}" id="style" name="style"/> 

                <!-- input for full name -->
                <div class="form-group">
                    <label for="name" class="label">Style Name</label>
                    <input 
                        type="name" 
                        name="name"
                        id="name" 
                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                        placeholder="Enter your full name here" 
                        value="{{ $style->name }}"
                        disabled
                    required>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <!-- input for sex -->
                <div class="form-group">
                    <label for="service" class="label">Service Type</label>
                    <select 
                        name="service" 
                        id="service" 
                        class="form-control{{ $errors->has('service') ? ' is-invalid' : '' }}" 
                        required>
                        <option value="">Select service type you what</option>
                        @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->service_type }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('service'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('service') }}</strong>
                        </span>
                    @endif
                </div>

                <!-- input for sex -->
                <div class="form-group">
                    <label for="session" class="label">Session</label>
                    <select 
                        name="session" 
                        id="session" 
                        class="form-control{{ $errors->has('session') ? ' is-invalid' : '' }}" 
                        required>
                        <option value="">Select the session you what</option>
                        <option value="MORNING">Morning</option>
                        <option value="AFTERNOON">Afternoon</option>
                        <option value="EVENING">Evening</option>
                    </select>
                    @if ($errors->has('session'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('session') }}</strong>
                        </span>
                    @endif
                </div>

                <br>
                <button type="submit" class="btn btn-primary"><b>BOOK!</b></button>

            </form>
        </div>
    </div>
</div>

@endsection
