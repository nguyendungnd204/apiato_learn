<?php

namespace App\Containers\AppSection\Class\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

final class ListClassesRequest extends ParentRequest
{
    protected array $decode = [];

    public function rules(): array
    {
        return [
            'search' => 'sometimes|string',
            'orderBy' => 'sometimes|string|in:id,class_code,name,created_at',
            'sortedBy' => 'sometimes|string|in:asc,desc',
            'page' => 'sometimes|integer|min:1',
            'limit' => 'sometimes|integer|min:1|max:100',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
