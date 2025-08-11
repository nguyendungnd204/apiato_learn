<?php

namespace App\Containers\AppSection\Student\Actions;

use App\Containers\AppSection\Student\Models\Student;
use App\Containers\AppSection\Student\Tasks\UpdateStudentTask;
use App\Containers\AppSection\Student\UI\API\Requests\UpdateStudentRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class UpdateStudentAction extends ParentAction
{
    public function __construct(
        private readonly UpdateStudentTask $updateStudentTask,
    ) {
    }

    public function run(UpdateStudentRequest $request): Student
    {
        $data = $request->sanitize([
            'student_code',
            'first_name',
            'last_name',
            'dob',
            'gender',
            'email',
            'phone',
            'address',
            'class',
            'major',
            'enrollment_date'
        ]);

        return $this->updateStudentTask->run($data, $request->id);
    }
}
