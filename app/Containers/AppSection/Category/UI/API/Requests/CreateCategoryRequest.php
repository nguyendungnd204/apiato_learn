<?php

namespace App\Containers\AppSection\Category\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

final class CreateCategoryRequest extends ParentRequest
{
    protected array $decode = [];

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'nullable|string',
            'slug' => 'required|string|unique:categories,slug',
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
