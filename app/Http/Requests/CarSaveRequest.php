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
        $transmissions = config('app-cars.transmissions');

        return [
            'brand_id' => 'required|integer|exists:brands,id',
            'model' => 'required|min:2|max:100',
            'vin' => [ 'required', 'min:4', 'max:14', $this->vinUniqueRule() ],
            'price' => 'required|integer|multiple_of:1000',
            'created_year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'transmission' => [ 'required', Rule::in(array_keys($transmissions)) ],
        ];
    }

    public function attributes()
    {
        return [
            'brand_id' => 'Марка',
            'model' => 'Модель',
            'vin' => 'VIN',
            'price' => 'Цена',
            'created_year' => 'Год выпуска',
            'transmission' => 'Тип привода',
        ];
    }

    protected function vinUniqueRule() {
        return Rule::unique(Car::class, 'vin')->whereNull('deleted_at');
    }
}
