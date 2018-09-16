@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Saloon Staffs</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    <a href="staffs/create" class="btn btn-sm btn-primary">Create New Staff</a>

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
        <th>Name</th>
        <th>Sex</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Role</th>
        <th>Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach($staffs as $staff)
        <tr>
        <td>{{ $staff->id }}</td>
        <td>{{ $staff->name }}</td>
        <td>{{ $staff->sex }}</td>
        <td>{{ $staff->email }}</td>
        <td>{{ $staff->phone }}</td>
        <td>{{ $staff->role }}</td>
        <td>
            <a href="/staffs/{{ $staff->id }}/edit" class="btn btn-sm btn-primary">Edit</a>
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
                    var _delete = confirm('Are you sure you want to delete this staff?');
                    if(_delete){
                        event.preventDefault();
                        document.getElementById('delete-form').setAttribute('action', '{{ route("staffs.destroy", [$staff->id]) }}');
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
