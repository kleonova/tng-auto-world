<?php

namespace App\Http\Requests;

class UpdateBrandRequest extends StoreBrandRequest
{
    /**
     * Override method 
     */
    protected function titleUniqueRule() {
        return parent::titleUniqueRule()->ignore($this->brand);
    }
}
