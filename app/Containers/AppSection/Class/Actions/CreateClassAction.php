<?php

namespace App\Containers\AppSection\Class\Actions;

use App\Containers\AppSection\Class\Models\ClassModel;
use App\Containers\AppSection\Class\Tasks\CreateClassTask;
use App\Containers\AppSection\Class\UI\API\Requests\CreateClassRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class CreateClassAction extends ParentAction
{
    public function __construct(
        private readonly CreateClassTask $createClassTask,
    ) {
    }

    public function run(CreateClassRequest $request): ClassModel
    {
        $data = $request->sanitizeInput();

        return $this->createClassTask->run($data);
    }
}
