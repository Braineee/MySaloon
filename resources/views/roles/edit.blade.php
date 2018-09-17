@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Saloon Role</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>
<!--
    table starts here
-->
<div>
    <form method="POST" action="{{ route('roles.update', [$role->id]) }}">
        @csrf

        <!-- input for full name -->
        <div class="form-group">
            <label for="role" class="label">Role Name</label>
            <input 
                type="role" 
                name="role"
                id="role" 
                class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" 
                placeholder="Enter your role here" 
                value = "{{ $role->role }}"
            required>
            @if ($errors->has('role'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('role') }}</strong>
                </span>
            @endif
        </div>

        <br>
        <button type="submit" class="btn btn-primary"><b>SAVE</b></button>
        <input type="hidden" name="_method" value="PUT">

    </form>
</div>
@endsection