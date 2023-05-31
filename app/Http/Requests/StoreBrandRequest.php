<?php

namespace App\Http\Requests;

use App\Models\Brand;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBrandRequest extends FormRequest
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
            'title' => [ 'required', 'min:2', 'max:100', $this->titleUniqueRule() ],
            'description' => 'sometimes'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Название бренда',
            'description' => 'Описание',
        ];
    }

    protected function titleUniqueRule() {
        return Rule::unique(Brand::class, 'title')->whereNull('deleted_at');
    }
}
