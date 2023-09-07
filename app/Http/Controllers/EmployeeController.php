<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = $request->query('page',1);
        $perPage = $request->query('per_page',10);
        $employee = Employee::OrderBy('id','desc')->paginate($perPage,['*'],'page',$page);
        return response()->json($employee);
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
        'name'=>'required|string',
        'lastname'=>'required|string',
        'photo'=>'required|mimes:jpeg,png,gif|max:2048',
        'position'=>'required|string',
        'phone'=>'required|string',
        'gender'=>'required|string',
        'salary'=>'required|string'
       ]);
       if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $fileName = $file->getClientOriginalName();
        $fileName = str_replace(' ', '', $fileName);
        $file->move(public_path('EmployeeImage/avatars'), $fileName);
        $imageValue = 'EmployeeImage/avatars/' . $fileName;
        $create = Employee::create([
            'name'=>$request->name,
            'lastname'=>$request->lastname,
            'position'=>$request->position,
            'phone'=>$request->phone,
            'gender'=>$request->gender,
            'salary'=>$request->salary,
            'photo'=>$imageValue
        ]);
        $responseData = [
            'name'=>$create->name,
            'lastname'=>$create->lastname,
            'position'=>$create->position,
            'phone'=>$create->phone,
            'gender'=>$create->gender,
            'salary'=>$create->salary,
            'photo'=>$create->photo,
            'updated_at' => $create->updated_at,
                    'created_at' => $create->created_at,
                    'id' => $create->id,
        ];
        return response()->json($responseData, 201);
    
    } else {
        return response()->json(['message' => 'file not uploaded'], 503);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(){}
    
    public function multilpledelete()
    {
        $ids = request('ids');
        $idsArray = explode(',', $ids);
        if (is_array($idsArray) && count($idsArray) > 0) {
            $employeesToDelete = Employee::whereIn('id', $idsArray)->get();
            foreach ($employeesToDelete as $employee) {
                if (!empty($employee->photo)) {
                    \File::delete($employee->photo);
                }
            }
            Employee::whereIn('id', $idsArray)->delete();
    
            return response()->json(['message' => 'Users deleted successfully']);
        } else {
            return response()->json(['message' => 'No valid IDs provided for deletion'], 400);
        }
    }
    
}
