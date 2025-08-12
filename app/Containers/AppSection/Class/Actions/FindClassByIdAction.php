<?php

namespace App\Containers\AppSection\Class\Actions;

use App\Containers\AppSection\Class\Models\ClassModel;
use App\Containers\AppSection\Class\Tasks\FindClassByIdTask;
use App\Containers\AppSection\Class\UI\API\Requests\FindClassByIdRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class FindClassByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindClassByIdTask $findClassByIdTask,
    ) {
    }

    public function run(FindClassByIdRequest $request): ClassModel
    {
        return $this->findClassByIdTask->run($request->id);
    }
}
