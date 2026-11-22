<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
 public static function userRules($userId): array //create new STATIC fun so we can call it other requests directly
    {
        return [
            'name' => ['sometimes', 'required', 'string'],

            'email' => [
                'sometimes',
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($userId)]
                ,'password'=>['nullable' , 'string' , 'min:8'],
            'phone_number'=>['sometimes','required' ,  'digits:10'],
            'address'=>['sometimes','required','string'],
        ];}
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */


    public function rules(): array
    {
        return self::userRules($this->route('id'));
    }
}
