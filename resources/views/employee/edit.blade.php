@extends('layouts.app')
   
@section('content')
<div class="container">
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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Product') }}</div>
                <div class="pull-right">
                  <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
                </div>
                <div class="card-body">
                   
                    {!! Form::model($employee, ['route' => ['employee.update', $employee->id] , 'method' => 'PATCH', 'enctype'=> 'multipart/form-data']) !!}
                        <div class="form-group row">
                            {{ Form::label('name', trans('Name'), ['class' => 'col-sm-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                            {{ Form::input('text', 'name', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('name', trans('Email'), ['class' => 'col-sm-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                            {{ Form::input('email', 'email', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('name', trans('Phone Number'), ['class' => 'col-sm-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                            {{ Form::input('number', 'phone', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('name', trans('User Image'), ['class' => 'col-sm-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                            {{ Form::input('file', 'photo', null, ['class' => 'form-control']) }}
                            </div>
                            @if(!empty($employee->photo))
                            <div class="col-lg-1">
                                <img src="/images/{{$employee->photo}}" height="80" width="80">
                            </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            {{ Form::label('name', trans('Salary'), ['class' => 'col-sm-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                            {{ Form::input('number', 'salary', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('name', trans('DOB'), ['class' => 'col-sm-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                            {{ Form::input('text', 'dob', null, ['class' => 'form-control' , 'id' => 'datepicker']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('name', trans('Deparment'), ['class' => 'col-sm-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                            {{ Form::select('department_id', $departments, $employee->department_id , ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('name', trans('Status'), ['class' => 'col-sm-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                            {{ Form::select('status',['1' => 'Active', '0' => 'Inctive'],null , ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {{ Form::submit(trans('Submit'), ['class' => 'btn btn-primary', 'id' => 'update-profile']) }}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>  
        </div>  
    </div>  
</div>  
@endsection