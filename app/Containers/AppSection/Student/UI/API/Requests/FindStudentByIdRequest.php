<?php

namespace App\Containers\AppSection\Student\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

final class FindStudentByIdRequest extends ParentRequest
{
    protected array $decode = [
        'id',
    ];

    public function rules(): array
    {
        return [];
    }
}
