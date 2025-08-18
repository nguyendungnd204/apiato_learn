<?php

namespace App\Containers\AppSection\Student\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

final class UpdateStudentRequest extends ParentRequest
{
    protected array $decode = [
        'id',
    ];

    public function rules(): array
    {
        return [
            'student_code' => 'sometimes|string|max:255|unique:students,student_code,' . $this->id,
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'dob' => 'sometimes|date',
            'gender' => 'sometimes|in:male,female,other',
            'email' => 'sometimes|email|max:255|unique:students,email,' . $this->id,
            'phone' => 'sometimes|string|max:255',
            'address' => 'sometimes|string|max:255',
            'class' => 'sometimes|string|max:255',
            'major' => 'sometimes|string|max:255',
            'enrollment_date' => 'nullable|date',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function sanitizeInput(): array
    {
        return $this->validated();
    }
}
