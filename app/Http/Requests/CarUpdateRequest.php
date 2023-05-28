<?php 
namespace App\Http\Requests;

class CarUpdateRequest extends CarSaveRequest
{
    protected function vinUniqueRule() {
        return parent::vinUniqueRule()->ignore($this->car);
    }
}