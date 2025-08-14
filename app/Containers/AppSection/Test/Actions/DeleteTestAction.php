<?php

namespace App\Containers\AppSection\Test\Actions;

use App\Containers\AppSection\Test\Tasks\DeleteTestTask;
use App\Containers\AppSection\Test\UI\API\Requests\DeleteTestRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class DeleteTestAction extends ParentAction
{
    public function __construct(
        private readonly DeleteTestTask $deleteTestTask,
    ) {
    }

    public function run(DeleteTestRequest $request): bool
    {
        return $this->deleteTestTask->run($request->id);
    }
}
