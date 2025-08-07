<?php

namespace App\Containers\AppSection\Category\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

final class ListCategoriesRequest extends ParentRequest
{
    protected array $decode = [];

    public function rules(): array
    {
        return [
            'limit' => 'integer',
            'page' => 'integer',
            'sort' => 'string|in:name,created_at,updated_at',
            'filter' => 'array',
            'filter.name' => 'string|nullable',
            'filter.is_active' => 'boolean|nullable',
            'filter.parent_id' => 'integer|exists:categories,id|nullable',
            
        ];
    }

    public function authorize(): bool
    {
        return true; // Authorization logic can be added here if needed
    }
}
