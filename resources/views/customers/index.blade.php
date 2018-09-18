@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Saloon Customers</h1>
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
        <th>Status</th>
        <th>Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
        <td>{{ $customer->id }}</td>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->sex }}</td>
        <td>{{ $customer->email }}</td>
        <td>{{ $customer->phone }}</td>
        @if($customer->isBlocked == 1)
        <td>Blocked</td>
        @else
        <td>Not Blocked</td>
        @endif
        <td>
            <!--a href="/customers/{{ $customer->id }}/edit" class="btn btn-sm btn-primary">Edit</a-->
            <a href="" onClick="_Block()" class="btn btn-sm btn-danger">{{ $customer->isBlocked? 'Unblock' : 'Block' }}</a>
            
            <!-- delete proccedure -->
            <form
                id="block-form"
                method="POST"
                
                style="display:none;"
            >
                {{ csrf_field() }}
            </form>
            <script type="text/javascript">
                function _Block(){
                    var _block = confirm('Are you sure you want to {{ $customer->isBlocked? "Unblock" : "Block" }} this customer?');
                    if(_block){
                        event.preventDefault();
                        document.getElementById('block-form').setAttribute('action', '{{ route("customers.blockCustomer", [$customer->id]) }}');
                        document.getElementById('block-form').submit();
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
