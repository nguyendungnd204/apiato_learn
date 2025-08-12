<?php

namespace App\Containers\AppSection\Student\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

final class DeleteStudentRequest extends ParentRequest
{
    protected array $decode = [
        'id',
    ];

    public function rules(): array
    {
        return [];
    }
    
    public function authorize(): bool
    {
        return true;
    }
}
