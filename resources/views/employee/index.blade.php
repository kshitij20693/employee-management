@extends('layouts.app')



@section('content')
    <div class="container">
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if(count($employees) > 0)
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Salary</th>
            <th>Email</th>
            <th>Department</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($employees as $employee)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->salary }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->department['name'] }}</td>
            <td>
                <form action="{{ route('employee.destroy',$employee->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('employee.edit',$employee->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $employees->links() !!}
    @else
    <div class="alert alert-warning">
        <strong>Sorry!</strong> No employee Found.
    </div>      
    @endif
  </div>    
@endsection