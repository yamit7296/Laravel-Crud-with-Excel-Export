@php ($title = 'Export Employee File')
@extends('layout.headers')
@section('main')
<div class="card m-3">
        <div class="card-header">
            Import/Export User
        </div>
        <div class="card-body">
            <form action="{{ route('employee.upload') }}" method="post" enctype="multipart/form-data">  
                @csrf
                <input type="file" name="file" id="file" title="Upload Excel File">
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Upload</button>
                    <a href="{{ url('/Employee') }}" class="btn btn-info">List</a>
                </div>
            </form>
        </div>
    </div>
@stop