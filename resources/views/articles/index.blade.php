@extends('layout')
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 5.5 CRUD Example from scratch</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('articles.create') }}"> Create New Article</a>
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
            <th>No</th>
            <th>Title</th>
            <th>Body</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($articles as $article)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $article->title}}</td>
        <td>{{ $article->body}}</td>
        <td>
            <!-- <a class="btn btn-info" href="{{ route('articles.show',$article->id) }}">Show</a> -->
            <a class="btn btn-primary" href="{{ route('articles.edit',$article->id) }}">Edit</a>
 
            {!! Form::open(['method' => 'DELETE','route' => ['articles.destroy', $article->id],'style'=>'display:inline']) !!}
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
    {!! $articles->links() !!}
@endsection