<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTagRequest extends StoreTagRequest
{
    /**
     * Override method 
     */
    protected function titleUniqueRule() {
        return parent::titleUniqueRule()->ignore($this->tag);
    }
}
