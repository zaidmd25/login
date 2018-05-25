@extends('layout')
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
               <center><h2>Laravel 5.5 </h2></center>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('customer.create') }}"> Create New User</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>Email</th>
            <!-- <th>Password</th> -->
            <th>FirstName</th>
            <th>LastName</th>
            <th>D.O.B</th>
            <th width="420px">Action</th>
        </tr>
    @foreach ($customer as $customers)
    <tr>
        <td>{{ $customers->id }}</td>
        <td>{{ $customers->email}}</td>
        <!-- <td>{{ $customers->password}}</td> -->
        <td>{{ $customers->firstname}}</td>
        <td>{{ $customers->lastname}}</td>
        <td>{{ $customers->dob}}</td>
        <td>
            
            <a class="btn btn-primary" href="{{ route('customer.edit',$customers->id) }}">Edit</a>
 
            {!! Form::open(['method' => 'DELETE','route' => ['customer.destroy', $customers->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger','data-toggle'=>'confirmation']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
    <script type="text/javascript">
     $(document).ready(function () {
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.closest('form').submit();
            }
        });
    });
    </script>
    {!! $customer->links() !!}
@endsection