<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Department;
use Illuminate\Validation\Rule;
use DB;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::latest()->where('status', '1')->paginate(5);
        return view('employee.index',compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deprtments = Department::where('status', '1')->get();
        return view('employee.create',compact('deprtments'));
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
            'email' => 'required|email|unique:employees',
            'phone' => 'required',
            'salary' => 'required',
            'dob' => 'required',
            'status' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->hasfile('photo'))
         {
            $file = $request->file('photo');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
         }
        $employee= new Employee;
        $employee->name=$request->get('name');
        $employee->email=$request->get('email');
        $employee->phone=$request->get('phone');
        $employee->salary=$request->get('salary');
        $employee->status=$request->get('status');
        $employee->department_id=$request->get('department_id');
        $date=date_create($request->get('dob'));
        $format = date_format($date,"Y-m-d");
        $employee->dob = $format;
        $employee->created_at = strtotime($format);
        $employee->photo=$name;
        $employee->save();
        
        return redirect('employee')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //return view('employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $departments = Department::where('status', '1')->pluck('name', 'id');

        $departments->prepend('None');
        return view('employee.edit',compact('employee','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,'.$employee->id,
            'phone' => 'required',
            'salary' => 'required',
            'dob' => 'required',
            'status' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        $employee->updateemployee($employee , $input ,$request);
        return redirect('employee')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
  
        return redirect()->route('employee.index')
                        ->with('success','employee deleted successfully');
    }

    public function statistics()
    {
        $employees = Employee::latest()->where('status', '1')->where('department_id', '0')->paginate(5);

        $employees_datas  = array();
        $highest_salary_employee_datas  = array();

        //Highest salry per department
        $highest_salary_employee_datas = DB::table('departments')
                     ->select(DB::raw('max(salary) as salary'),'departments.name as department','e.name as empname')
                     ->leftJoin('employees AS e', 'e.department_id', '=', 'departments.id')
                     ->where('e.status', '1')
                     ->groupBy('departments.id')
                     ->get();
        //Find the name and age of the youngest employee in each department.
        $employees_datas = DB::table('employees')
                     ->select(DB::raw('CEIL(DATEDIFF(CURDATE(), employees.dob) / 365) as age'),'departments.name as department','employees.name as name')
                     ->join('departments', 'employees.department_id', '=', 'departments.id')
                     ->where('employees.status', '1')
                     ->groupBy('departments.id')
                     ->get();

        return view('employee.statistics',compact('employees','employees_datas','highest_salary_employee_datas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
