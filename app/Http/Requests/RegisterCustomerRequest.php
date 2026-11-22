<?php

namespace App\Http\Requests;

//use Illuminate\Contracts\Validation\ValidationRule;
// use Illuminate\Foundation\Http\FormRequest;

class RegisterCustomerRequest extends StoreUserRequest
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
        return array_merge(
            parent::rules(),// here we take the StoreUserRequest rules
            [

            'date_of_birth'=>['required','date' ],
            'gender'=>['required', 'in:male,female']

        ]);
    }
}
