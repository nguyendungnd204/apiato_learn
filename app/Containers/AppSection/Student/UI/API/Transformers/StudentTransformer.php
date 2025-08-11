<?php

namespace App\Containers\AppSection\Student\UI\API\Transformers;

use App\Containers\AppSection\Student\Models\Student;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

final class StudentTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(Student $student): array
    {
        return [
            'type' => $student->getResourceKey(),
            'id' => $student->getHashedKey(),
            'student_code' => $student->student_code,
            'first_name' => $student->first_name,
            'last_name' => $student->last_name,
            'dob' => $student->dob,
            'gender' => $student->gender,
            'email' => $student->email,
            'phone' => $student->phone,
            'address' => $student->address,
            'class' => $student->class,
            'major' => $student->major,
            'enrollment_date' => $student->enrollment_date,
            'created_at' => $student->created_at,
            'updated_at' => $student->updated_at,
            'readable_created_at' => $student->created_at->diffForHumans(),
            'readable_updated_at' => $student->updated_at->diffForHumans(),
        ];
    }
}
