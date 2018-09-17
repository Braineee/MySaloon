@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Saloon Service</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    <a href="services/create" class="btn btn-sm btn-primary">Create New Service</a>

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
        <th>Service Type</th>
        <th>Service Percentage</th>
        <th>Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach($services as $service)
        <tr>
        <td>{{ $service->id }}</td>
        <td>{{ $service->service_type }}</td>
        <td>{{ $service->service_percentage }}</td>
        <td>
            <a href="/services/{{ $service->id }}/edit" class="btn btn-sm btn-primary">Edit</a>
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
                    var _delete = confirm('Are you sure you want to delete this service?');
                    if(_delete){
                        event.preventDefault();
                        document.getElementById('delete-form').setAttribute('action', '{{ route("services.destroy", [$service->id]) }}');
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
