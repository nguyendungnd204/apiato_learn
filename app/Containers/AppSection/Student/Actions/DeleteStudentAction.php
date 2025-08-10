<?php

namespace App\Containers\AppSection\Student\Actions;

use App\Containers\AppSection\Student\Tasks\DeleteStudentTask;
use App\Containers\AppSection\Student\UI\API\Requests\DeleteStudentRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class DeleteStudentAction extends ParentAction
{
    public function __construct(
        private readonly DeleteStudentTask $deleteStudentTask,
    ) {
    }

    public function run(DeleteStudentRequest $request): bool
    {
        return $this->deleteStudentTask->run($request->id);
    }
}
