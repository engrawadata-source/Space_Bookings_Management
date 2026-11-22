<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpaceRequest extends FormRequest
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
            'name'=>['required' , 'string'],
            'description'=>['required' , 'string'],
            'type'=>['required' , 'string'],
            'center_id'=>['required' , 'integer','exists:centers,id'],
            'max_capacity'=>['required' , 'integer' , 'min:2'],
            'hourly_price'=>['required','numeric','min:0','decimal:0,2' , 'max:999.99'] , //cause the migrations says total digits=5 , and the num after comma is 2
            'status'=>['required' , 'in:available,maintenance']
        ];
    }
}


