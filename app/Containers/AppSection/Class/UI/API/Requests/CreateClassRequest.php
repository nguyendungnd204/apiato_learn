<?php

namespace App\Containers\AppSection\Class\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

final class CreateClassRequest extends ParentRequest
{
    protected array $decode = [];

    public function rules(): array
    {
        return [];
    }
}
