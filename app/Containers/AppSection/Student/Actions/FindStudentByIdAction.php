<?php

namespace App\Containers\AppSection\Student\Actions;

use App\Containers\AppSection\Student\Models\Student;
use App\Containers\AppSection\Student\Tasks\FindStudentByIdTask;
use App\Containers\AppSection\Student\UI\API\Requests\FindStudentByIdRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class FindStudentByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindStudentByIdTask $findStudentByIdTask,
    ) {
    }

    public function run(FindStudentByIdRequest $request): Student
    {
        return $this->findStudentByIdTask->run($request->id);
    }
}
