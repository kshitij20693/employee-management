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
                <div class="card-header">{{ __('Add New Product') }}</div>
                <div class="pull-right">
                  <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
                </div>
                <div class="card-body">
                <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
  
                <div class="form-group row">
                  <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                      <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                      @if ($errors->has('name'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Email') }}</label>

                    <div class="col-md-6">
                      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                      @if ($errors->has('email'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="phone" class="col-sm-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                    <div class="col-md-6">
                      <input id="number" type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>
                      @if ($errors->has('phone'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('phone') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="number" class="col-sm-4 col-form-label text-md-right">{{ __('User Image') }}</label>

                    <div class="col-md-6">
                      <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="photo" value="{{ old('photo') }}" required autofocus>
                      @if ($errors->has('photo'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('photo') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="salary" class="col-sm-4 col-form-label text-md-right">{{ __('Salary') }}</label>

                    <div class="col-md-6">
                      <input id="salary" type="number" class="form-control{{ $errors->has('salary') ? ' is-invalid' : '' }}" name="salary" value="{{ old('salary') }}" required autofocus>
                      @if ($errors->has('salary'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('salary') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="salary" class="col-sm-4 col-form-label text-md-right">{{ __('DOB') }}</label>

                    <div class="col-md-6">
                      <input id="datepicker" type="text" class="form-control dob {{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ old('dob') }}" required autofocus>
                      @if ($errors->has('dob'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('dob') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="status" class="col-sm-4 col-form-label text-md-right">{{ __('Deparment') }}</label>

                    <div class="col-md-6">
                      <select class="form-control {{ $errors->has('department') ? ' is-invalid' : '' }}" name="department_id" >
                        <option value="0">No Department</option>
                        @foreach($deprtments as $deprtment)
                          <option value="{{ $deprtment->id }}">
                              {{ $deprtment->name }}
                          </option>
                        @endforeach
                      </select>
                      @if ($errors->has('status'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('status') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="status" class="col-sm-4 col-form-label text-md-right">{{ __('Status') }}</label>

                    <div class="col-md-6">
                      <select class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" required="true">
                        <option value="1">Active</option>
                        <option value="0">Inctive</option>\
                      </select>
                      @if ($errors->has('status'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('status') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection