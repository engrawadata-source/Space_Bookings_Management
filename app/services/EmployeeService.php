<?php

namespace App\services;

use App\services\UserService;
use App\Models\Employee;
use App\Models\User;

class EmployeeService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected UserService $userService)
    {}
    public function store(array $data){
        $data['type'] = 'employee';

        $user = $this->userService->store($data);

       $employee= Employee::query()->create([
          'user_id'=>$user->id , //here we take the new id of user which created , not id from request
          'job_title'=>$data['job_title'],
          'hire_date'=>$data['hire_date']
          ]);
          return $employee;
    }

    ##update emp
    public function update($id, array $data){
        $employee= Employee::query()->find($id);
        $user = $this->userService->update($employee->user_id , $data);
        $employee->update([
            'job_title' => $data['job_title'],
            'hire_date' => $data['hire_date']
        ]);
        return $employee;

    }

    ##get all emp
    public function index(){
    $employees= Employee::query()->with('user')->get();
    return $employees;
    }

    #delete emp & user at same time
    public function destroy($id){
        $employee= Employee::query()->find($id);
        $employee->delete();
        User::query()->where('id' , $employee->user_id)->delete();
        return true;
    }

}
