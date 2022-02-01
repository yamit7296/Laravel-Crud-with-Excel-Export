@php ($title = 'Create Employee')

@extends('layout.headers')

@section('main')

@if ($errors->any())
  <div class="alert alert-danger">
     <ul>
        @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
        @endforeach
     </ul>
     @if ($errors->has('email'))
     @endif
  </div>
@endif

@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@if(isset($employee) && !empty($employee))

<div class="card mt-4">
        <div class="card-header">Update Employee
            <a href="{{ url('/Employee') }}" class="btn btn-info  pull-right"><i class="fa fa-list"></i>Employee List</a>
        </div>
        <div class="card-body">
            <form action="{{ route('Employee.update', ['Employee' => $employee->id ])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Employee Name :</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $employee->name }}">
                </div>
                <div class="form-group">
                    <label for="mobile">Employee Mobile Number :</label>
                    <input type="number" name="mobile" id="mobile" class="form-control" value="{{ $employee->mobile }}">
                </div>
                <div class="form-group">
                    <label for="email">Employee Email Id :</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ $employee->email }}">
                </div>
                <div class="form-group">
                    <label for="DOB">Employee Birth Date :</label>
                    <input type="text" name="DOB" id="DOB" class="form-control datepicker" value="{{ $employee->DOB }}">
                </div>
                <div class="form-group">
                    <label for="salary">Employee Salary :</label>
                    <input type="number" name="salary" id="salary" class="form-control" value="{{ $employee->salary }}">
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>Update</button>
                <a href="{{ url('Employee') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Back</a>
            </form>
        </div>
    </div>


@else

<div class="card mt-4">
        <div class="card-header">Add Employee
            <a href="{{ url('/Employee') }}" class="btn btn-info  pull-right"><i class="fa fa-list"></i>Employee List</a>
        </div>
        <div class="card-body">
            <form action="{{ route('Employee.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Employee Name :</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="mobile">Employee Mobile Number :</label>
                    <input type="number" name="mobile" id="mobile" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Employee Email Id :</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="DOB">Employee Birth Date :</label>
                    <input type="text" name="DOB" id="DOB" class="form-control datepicker">
                </div>
                <div class="form-group">
                    <label for="salary">Employee Salary :</label>
                    <input type="number" name="salary" id="salary" class="form-control">
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>Add Employee</button>
                <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i>Reset</button>
            </form>
        </div>
    </div>


@endif

@stop