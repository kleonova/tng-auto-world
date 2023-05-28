<?php

namespace App\Http\Requests;

use App\Models\Car;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CarSaveRequest extends FormRequest
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
     */
    public function rules(): array
    {
        $options = config('app-cars.bodyStyles');

        return [
            'brand' => 'required|min:2|max:100',
            'model' => 'required|min:2|max:100',
            'vin' => [ 'required', 'min:4', 'max:14', $this->vinUniqueRule() ],
            'price' => 'required|integer|multiple_of:1000',
            'created_year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'body_style' => [ 'required', Rule::in(array_keys($options)) ],
        ];
    }

    public function attributes()
    {
        return [
            'brand' => 'Марка',
            'model' => 'Модель',
            'vin' => 'VIN',
            'price' => 'Цена',
            'created_year' => 'Год выпуска',
            'avatar' => 'Изображение',
            'body_style' => 'Тип кузова',
        ];
    }

    protected function vinUniqueRule() {
        return Rule::unique(Car::class, 'vin')->whereNull('deleted_at');
    }
}
