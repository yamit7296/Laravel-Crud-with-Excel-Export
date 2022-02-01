    @php ($title = 'Export Module')
    @extends('layout.headers')

    @section('main')
    
       
    
    <div class="card m-2">
        <div class="card-header">
             Employee List
            <a href="{{ url('/Employee/create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>Employee</a>  
            <a href="{{ url('/Employee/Export')}}" class="btn btn-success pull-right mr-1"><i class="fa fa-upload"></i>Export List</a>  
        </div>
        <br>
        <table class="table table-bordered display stripe" id="myTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>DOB</th>
                    <th>Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->mobile }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->DOB }}</td>
                    <td>{{ $employee->salary }}</td>
                    <td>
                        <a href="{{ url('Employee/'.$employee->id.'/edit')}}" type="button" class="btn btn-sm btn-warning"><i class="fa fa-pen"></i>Edit</a>
                        <form action="{{ route('Employee.destroy', $employee->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mt-1"><i class="fa fa-trash"></i>Delete</button>
                        </form>    
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   

    @stop
