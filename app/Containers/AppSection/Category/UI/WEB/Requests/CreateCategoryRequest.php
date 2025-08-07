<?php

namespace App\Containers\AppSection\Category\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

final class CreateCategoryRequest extends ParentRequest
{
    protected array $decode = [];

    public function rules(): array
    {
        return [];
    }
}
