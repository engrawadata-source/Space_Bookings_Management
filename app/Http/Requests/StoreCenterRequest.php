<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class StoreCenterRequest extends FormRequest
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
        return [
            'name'=>['required','string'],
            'description'=> ['required','string'],
            'address'=>['required','string'],
            'city'=>['required','string'] ,
            'country'=>['required','string'] ,
            'latitude' => ['required','numeric','between:-90,90','regex:/^-?\d{1,2}(\.\d{1,7})?$/'],
            'longitude' => ['required','numeric','between:-180,180','regex:/^-?\d{1,3}(\.\d{1,7})?$/'],
            'contact_number'=> ['required','digits:10'] ,
            'status' => ['required', 'in:active,inactive'],
        ];
    }
}




