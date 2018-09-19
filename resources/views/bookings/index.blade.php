@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Saloon Session Bookings</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    <!--a href="staffs/create" class="btn btn-sm btn-primary">Create New Staff</a-->

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
        @foreach($bookings as $booking)
        <tr>
        <td>{{ $booking->id }}</td>
        <td>{{ $booking->name }}</td>
        <td>{{ $booking->service_type }}</td>
        <td>{{ $booking->style_name }}</td>
        <td>{{ $booking->session }}</td>
        <td>{{ $booking->session }}</td>
        <td>
            <a href="/bookings/{{ $booking->id }}/edit" class="btn btn-sm btn-primary">view</a>
            <!--a href="" onClick="_Delete()" class="btn btn-sm btn-danger">Delete</a-->
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
                    var _delete = confirm('Are you sure you want to delete this booking?');
                    if(_delete){
                        event.preventDefault();
                        document.getElementById('delete-form').setAttribute('action', '{{ route("bookings.destroy", [$booking->id]) }}');
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
