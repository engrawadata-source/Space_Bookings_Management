<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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

            'space_id'=>[
                'required','integer','exists:spaces,id'],


            'start_time'=>[
                'required','date_format:Y-m-d H:i:s', 'after:now'],

            'end_time'=> [
                'required','date_format:Y-m-d H:i:s','after:start_time'],

            'num_of_people'=>['required','integer' , 'min:1'],
        ];
    }
}
