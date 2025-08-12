<?php

namespace App\Containers\AppSection\Class\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

final class UpdateClassRequest extends ParentRequest
{
    protected array $decode = [
        'id',
    ];

    public function rules(): array
    {
        return [
            'class_code' => 'sometimes|string|max:50|unique:classes,class_code,' . $this->id,
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string|max:1000',
            'start_date' => 'nullable|date',
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
