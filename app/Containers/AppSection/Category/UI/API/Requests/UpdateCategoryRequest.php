<?php

namespace App\Containers\AppSection\Category\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

final class UpdateCategoryRequest extends ParentRequest
{
    protected array $decode = [
        'id',
    ];

    public function rules(): array
    {
        return [
            'id' => 'required|integer',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'slug' => 'required|string|unique:categories,slug,' . $this->id,
            'is_active' => 'boolean',
            'parent_id' => 'nullable|exists:categories,id',
            'sort_order' => 'integer|min:0',
        ];
    }

    public function authorize(): bool
    {
        return true; // Authorization logic can be added here if needed
    }
}
