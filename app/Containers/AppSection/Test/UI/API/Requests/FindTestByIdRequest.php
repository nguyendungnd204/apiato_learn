<?php

namespace App\Containers\AppSection\Test\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

final class FindTestByIdRequest extends ParentRequest
{
    protected array $decode = [
        'id',
    ];

    public function rules(): array
    {
        return [];
    }
}
