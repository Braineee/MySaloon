@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Saloon Roles</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    <a href="roles/create" class="btn btn-sm btn-primary">Create New Role</a>

    </div>
</div>
<!--
    table starts here
-->
<div class="table-responsive">
    <table class="table table-striped table-sm">
    <thead>
        <tr>
        <th>#</th>
        <th>Role</th>
        <th>Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
        <tr>
        <td>{{ $role->id }}</td>
        <td>{{ $role->role }}</td>
        <td>
            <a href="/roles/{{ $role->id }}/edit" class="btn btn-sm btn-primary">Edit</a>
            <a href="" onClick="_Delete()" class="btn btn-sm btn-danger">Delete</a>
            <!-- delete proccedure -->
            <form
                id="delete-form"
                method="POST"
                
                style="display:none;"
            >
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
            </form>
            <script type="text/javascript">
                function _Delete(){
                    var _delete = confirm('Are you sure you want to delete this role?');
                    if(_delete){
                        event.preventDefault();
                        document.getElementById('delete-form').setAttribute('action', '{{ route("roles.destroy", [$role->id]) }}');
                        document.getElementById('delete-form').submit();
                    }
                }
            </script>
        </td>
        </tr>
        @endforeach
    </tbody>
    </table>

</div>

@endsection
