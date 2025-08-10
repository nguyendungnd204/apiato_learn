<?php

namespace App\Containers\AppSection\Student\Actions;

use App\Containers\AppSection\Student\Models\Student;
use App\Containers\AppSection\Student\Tasks\CreateStudentTask;
use App\Containers\AppSection\Student\UI\API\Requests\CreateStudentRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class CreateStudentAction extends ParentAction
{
    public function __construct(
        private readonly CreateStudentTask $createStudentTask,
    ) {
    }

    public function run(CreateStudentRequest $request): Student
    {
        $data = $request->sanitize([
            // add your request data here
        ]);

        return $this->createStudentTask->run($data);
    }
}
