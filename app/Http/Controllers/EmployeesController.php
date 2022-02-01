<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        // dd($employees);
        // var_dump($employees);
        return view('employee.index', compact('employees', 'employees'));
        // return view('employee.index');
    }

    public function uploadFile()
    {

        return view('employee.uploadFile');
    }

    public function uploadFilePost(Request $request)
    {
        $file = $request->file('file');

        if ($file) {

            $temp_path = $file->getRealPath();
            $file = fopen($temp_path, 'r');
            $importData_arr = array();

            $num = 0;
            while (($row = fgetcsv($file, '1000', ',')) !== false) {
                $data = count($row);
                if ($num == 0) {
                    $num++;
                    continue;
                }
                foreach ($row as $rowData) {
                    $importData_arr[$num][] = $rowData;
                }
                $num++;
            }
            fclose($file);

            foreach ($importData_arr as $record) {
                try {
                    DB::beginTransaction();
                    Employee::create([
                        'name' => $record[1],
                        'mobile' => $record[2],
                        'email' => $record[3],
                        'salary' => $record[4],
                        'DOB' => $record[5],
                        'created_by' => 1,
                        'updated_by' => 0
                    ]);
                    DB::commit();
                } catch (Exception $e) {
                    throw new Exception($e->getMessage());
                    DB::rollBack();
                }
            }
        } else {
            throw new \Exception("No File was uploaded ");
        }

        return redirect()->route('Employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|numeric|digits:10',
            'email' => 'required|email',
            'DOB' => 'required',
            'salary' => 'required|numeric'
        ]);

        Employee::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'DOB' => $request->DOB,
            'salary' => $request->salary,
            'created_by' => 1,
            'updated_by' => 0
        ]);

        return redirect('/Employee/create')->with('status', 'Record Added!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        // dd($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.create')->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $employee_id)
    {
        // Employee::findOrFail($employee);

        $request->validate([
            'name' => 'required',
            'mobile' => 'required|numeric|digits:10',
            'email' => 'required|email',
            'DOB' => 'required',
            'salary' => 'required|numeric'
        ]);

        $employee = Employee::findOrFail($employee_id);
        $employee->update($request->all());

        return redirect('/Employee/create')->with('status', 'Record Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($employee_id)
    {
        $employee = Employee::findOrFail($employee_id);
        // var_dump($employee);
        $employee->delete();
        // dd($result);
        return redirect('/Employee')->with('status', 'Employee Removed!!');
    }
}
