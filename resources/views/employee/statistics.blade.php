@extends('layouts.app')



@section('content')
    <div class="container">
    <h5>
        List down employees who are not belongs to any department.
    </h5>
    @if(count($employees) > 0)
    
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Salary</th>
            <th>Email</th>
        </tr>
        @foreach ($employees as $employee)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->salary }}</td>
            <td>{{ $employee->email }}</td>
        </tr>
        @endforeach
    </table>
     @else
    <div class="alert alert-warning">
        <strong>Sorry!</strong> No employee Found.
    </div>      
    @endif
    <h5>
         Find the name and age of the youngest employee in each department.
    </h5>
    @if(count($employees_datas) > 0)
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Age</th>
            <th>Department</th>
        </tr>
        @foreach ($employees_datas as $employees_data)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $employees_data->name }}</td>
            <td>{{ $employees_data->age }}</td>
            <td>{{ $employees_data->department }}</td>
        </tr>
        @endforeach
    </table>
     @else
    <div class="alert alert-warning">
        <strong>Sorry!</strong> No employee Found.
    </div>      
    @endif
    <h5>
         Department wise highest salary of employees.
    </h5>
    @if(count($highest_salary_employee_datas) > 0)
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Age</th>
            <th>Department</th>
        </tr>
        @foreach ($highest_salary_employee_datas as $highest_salary_employee_data)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $highest_salary_employee_data->empname }}</td>
            <td>{{ $highest_salary_employee_data->salary }}</td>
            <td>{{ $highest_salary_employee_data->department }}</td>
        </tr>
        @endforeach
    </table>
    @else
    <div class="alert alert-warning">
        <strong>Sorry!</strong> No employee Found.
    </div>      
    @endif
  </div>    
@endsection