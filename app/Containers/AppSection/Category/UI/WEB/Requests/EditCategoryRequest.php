<?php

namespace App\Containers\AppSection\Category\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

final class EditCategoryRequest extends ParentRequest
{
    protected array $decode = [
        'id',
    ];

    public function rules(): array
    {
        return [];
    }
}
