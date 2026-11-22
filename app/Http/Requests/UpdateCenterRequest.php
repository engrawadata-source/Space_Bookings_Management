<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpdateCenterRequest extends FormRequest
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
        'name'=>['sometimes', 'required', 'string'],
        'description'=> ['sometimes','required','string'],
        'address'=>['sometimes','required','string'],
        'city'=>['sometimes','required','string'] ,
        'country'=>['sometimes','required','string'] ,
        'latitude' => ['sometimes','required','numeric','between:-90,90','regex:/^-?\d{1,2}(\.\d{1,7})?$/'],
        'longitude' => ['sometimes','required','numeric','between:-180,180','regex:/^-?\d{1,3}(\.\d{1,7})?$/'],
        'contact_number'=> ['sometimes','required','digits:10'] ,
        'status'=>['sometimes','required','in:active,inactive']
        ];
    }
}

