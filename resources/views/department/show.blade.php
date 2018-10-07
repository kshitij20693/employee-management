@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
    <div class="card-body">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Department</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('department.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $department->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                {{ $department->status }}
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection