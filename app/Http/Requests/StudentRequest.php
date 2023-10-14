<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'roll_number' => 'string|unique:students',
            'name' => 'string|required',
            'gender' => 'string|required',

            'parents' => 'string',
            'date_of_birth' => 'string',
            'phone' => 'string|required',
            'email' => 'email',
        ];
    }
}
