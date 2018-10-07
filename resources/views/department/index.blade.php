@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Departments</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('department.create') }}"> Create New department</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if(count($departments) > 0)
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
        </tr>
        @foreach ($departments as $department)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $department->name }}</td>
        </tr>
        @endforeach
    </table>
  
    {!! $departments->links() !!}
    @else
    <div class="alert alert-warning">
        <strong>Sorry!</strong> No department Found.
    </div>      
    @endif
</div>   
@endsection