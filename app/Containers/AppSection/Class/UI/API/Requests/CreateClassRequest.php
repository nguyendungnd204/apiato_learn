<?php

namespace App\Containers\AppSection\Class\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

final class CreateClassRequest extends ParentRequest
{
    protected array $decode = [];

    public function rules(): array
    {
        return [
            'class_code' => 'required|string|unique:classes,class_code|max:50',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'start_date' => 'nullable|date|after_or_equal:today',
            'end_date' => 'nullable|date|after:start_date',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function sanitizeInput(): array
    {
        return $this->validated();
    }
}
