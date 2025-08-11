<?php

namespace App\Containers\AppSection\Class\Actions;

use App\Containers\AppSection\Class\Tasks\DeleteClassTask;
use App\Containers\AppSection\Class\UI\API\Requests\DeleteClassRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class DeleteClassAction extends ParentAction
{
    public function __construct(
        private readonly DeleteClassTask $deleteClassTask,
    ) {
    }

    public function run(DeleteClassRequest $request): bool
    {
        return $this->deleteClassTask->run($request->id);
    }
}
