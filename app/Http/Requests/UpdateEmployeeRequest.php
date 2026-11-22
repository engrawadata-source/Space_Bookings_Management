<?php

namespace App\Http\Requests;

// use Illuminate\Contracts\Validation\ValidationRule;

use App\Models\Employee;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
     public function rules(): array
    {
        $employee = Employee::find($this->route('id'));

        return array_merge(
            UpdateUserRequest::userRules($employee->user_id),
            [
                'job_title' => ['sometimes', 'required', 'string'],
                'hire_date' => ['sometimes', 'required', 'date']
            ]
        );
    }
}
