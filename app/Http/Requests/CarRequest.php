<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'brand' => 'required|min:3|max:100',
            'model' => 'required|min:3|max:100',
            'price' => 'required|integer|multiple_of:1000',
            'created_year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'avatar' => 'file'
        ];
    }
}
