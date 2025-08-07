<?php

namespace App\Containers\AppSection\Category\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

final class FindCategoryByIdRequest extends ParentRequest
{
    protected array $decode = [
        'id',
    ];

    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:categories,id',
        ];
    }

    public function authorize():bool
    {
        return true; // Authorization logic can be added here if needed
    }
}
