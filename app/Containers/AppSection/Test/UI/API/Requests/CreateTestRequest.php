<?php

namespace App\Containers\AppSection\Test\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

final class CreateTestRequest extends ParentRequest
{
    protected array $decode = [];

    public function rules(): array
    {
        return [];
    }
}
