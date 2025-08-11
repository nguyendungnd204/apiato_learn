<?php

namespace App\Containers\AppSection\Student\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

final class CreateStudentRequest extends ParentRequest
{
    protected array $decode = [];

    public function rules(): array
    {
        return [
            'student_code' => 'required|string|max:255|unique:students,student_code',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'email' => 'required|email|max:255|unique:students,email',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'class' => 'nullable|string|max:255',
            'major' => 'nullable|string|max:255',
            'enrollment_date' => 'nullable|date',
        ];
    }
    public function authorize(): bool
    {
        return true; 
    }
}
