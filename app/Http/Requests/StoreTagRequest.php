<?php

namespace App\Http\Requests;

use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTagRequest extends FormRequest
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
            'color' => 'sometimes'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Тег',
            'color' => 'Цвет',
        ];
    }

    protected function titleUniqueRule() {
        return Rule::unique(Tag::class, 'title');
    }
}
