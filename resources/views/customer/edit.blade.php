@extends('layout')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#adderform').validate()
        $('#adderform').on('submit', function(e){
            e.preventDefault();
            console.log($('#adderform').valid())
            if($('#adderform').valid()){
                $.ajax({
                    type: "POST",
                    url: "{{route('customer.store')}}",
                    data: $('#adderform').serialize(), 
                    success: function( response ) {
                        alert( response.message );   
                        window.location = "{{url('customer')}}";
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log(XMLHttpRequest);
                        var response = XMLHttpRequest.responseJSON.errors;
                        var errorString = '';
                        $.each( response, function( key, value) {
                            errorString += '' + value + '';
                            $("#"+key).addClass("btnerrors");
                        });
                        errorString += '';
                        alert("Error: " + errorString);
                    }   
                });
            }
        });
    });
</script>
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Customer</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('customer.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- {!! Form::model($customer, ['id' =>'adderform','method' => 'PATCH','route' => ['customer.update', $customer->id]]) !!} -->
    {!! Form::open(array('id'=>'addform','novalidate' => 'true')) !!}
        <div class="row">
    <div class="container">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('required' => 'required','placeholder' => 'Email','class' => 'form-control','id' => 'email')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
             <!-- {!! Form::password('secret',null,array('placeholder' => 'firstname','class' => 'form-control','style'=>'height:150px')) !!} -->
            {!! Form::input('password','password',null, array('placeholder' => 'password','class' => 'form-control','id' => 'password')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>FirstName:</strong>
            {!! Form::text('firstname', null, array('required' => 'required','placeholder' => 'firstname','class' => 'form-control','id' => 'firstname')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">
            <strong>LastName:</strong>
            {!! Form::text('lastname', null, array('required' => 'required','placeholder' => 'lastname','class' => 'form-control','id' => 'lastname')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>D.O.B:</strong>
            {!! Form::text('dob', null, array('required' => 'required','placeholder' => 'D.O.B(YYYY-MM-DD)','class' => 'form-control','id' => 'dob')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
    </div>
        {!! Form::close() !!}
    @endsection