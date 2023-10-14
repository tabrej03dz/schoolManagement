<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StandardBatchSubjectRequest extends FormRequest
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
            'standard_id' => 'required',
            'batch_id' => 'required',
            'subject_id' => 'required',
        ];
    }
}
