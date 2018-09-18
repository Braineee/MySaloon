@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">List Of Style Available</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    <form method="POST" action="{{ route('viewstyle.search') }}">
        @csrf
        <div class="input-group mb-3">
            <select 
                name="search"
                id="search"
                class="form-control{{ $errors->has('sex') ? ' is-invalid' : '' }}" 
            >
                <option value="">Select an option to search</option>
                <option value="MALE">Male</option>
                <option value="FEMALE">Female</option>
            </select>
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
    </div>
</div>
<!--
    table starts here
-->
<div class="row">
@foreach($styles as $style)
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
                <p class="card-text"><small><strong>N:B</strong> Home Service attracts a extra fee, starting at {{ 5 }}% increase.</small></p>
                <div class="d-flex justify-content-between align-items-center">

                    <form method="POST" action="{{ route('viewstyle.book') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="book" value="{{ $style->id }}">
                        <button type="submit" class="btn btn-sm btn-outline-primary">Book Session</button>
                    </form>


                    <small class="text-muted">{{ $style->duration }} mins</small>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>

@endsection
