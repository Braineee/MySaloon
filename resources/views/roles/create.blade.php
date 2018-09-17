@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Saloon Role</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>
<!--
    table starts here
-->
<div>
    <form method="POST" action="{{ route('roles.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- input for full name -->
        <div class="form-group">
            <label for="role" class="label">Role Name</label>
            <input 
                type="role" 
                name="role"
                id="role" 
                class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" 
                placeholder="Enter role name here" 
            required>
            @if ($errors->has('role'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('role') }}</strong>
                </span>
            @endif
        </div>

        <br>
        <button type="submit" class="btn btn-primary"><b>CREATE ROLE</b></button>

    </form>
</div>
@endsection