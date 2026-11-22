<?php

namespace App\Http\Controllers;


use App\services\EmployeeService;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;


class EmployeeController extends Controller
{
public function __construct( protected EmployeeService $employeeService){}

##create employee
public function store(StoreEmployeeRequest $request){
$this->employeeService->store($request->validated());
    return redirect()->route('employees.index');
}

#update emp
public function update($id, UpdateEmployeeRequest $request){
    $employee= $this->employeeService->update( $id,
        $request->validated());
        return redirect()->route('employees.index');
}


##get all emp
public function index(){
    $employees= $this->employeeService->index();
        return view('employees.index', compact('employees'));
}

#delete emp
public function destroy($id){
    $this->employeeService->destroy($id);
    return redirect()->route('employees.index');

}


}
