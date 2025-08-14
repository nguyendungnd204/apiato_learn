<?php

namespace App\Containers\AppSection\Student\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

final class SearchStudentRequest extends ParentRequest
{
    protected array $decode = [];

    public function rules(): array
    {
        return [
            'student_code' => 'nullable|string|max:30',
            'first_name' => 'nullable|string|max:30',
            'last_name' => 'nullable|string|max:30',
        ];
    }

    public function authorize():bool 
    {
        return true;
    }
}
